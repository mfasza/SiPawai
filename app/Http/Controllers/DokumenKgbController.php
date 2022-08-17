<?php

namespace App\Http\Controllers;

use App\dokumen_kgb;
use App\Pegawai;
use App\Golongan;
use App\Gaji;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use File;

class DokumenKgbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monitoring()
    {
        $pegawai = Pegawai::select('nip', 'nama', 'tmt_cpns', 'id_golongan')->get();
        $data = array();
        foreach ($pegawai as $i => $p) {
            if ($p->kgbs->count() > 0) {
                $tgl_kgb = Carbon::createFromFormat('Y-m-d', $p->kgbs->first()->tgl_kgb);
                $tmt_cpns = Carbon::createFromFormat('Y-m-d', $p->tmt_cpns);
                $temp = [
                    'nama' => $p->nama,
                    'kgb_terakhir' => $tgl_kgb->format('Y-m-d'),
                    'kgb_selanjutnya' => $tmt_cpns->addYears($tmt_cpns->diffInYears($tgl_kgb) + 2)->format('Y-m-d')
                ];
                array_push($data, $temp);
            } else {
                if ($p->golongans->golongan !== 2) {
                    $tgl = Carbon::createFromFormat('Y-m-d', $p->tmt_cpns)->addYears(2);
                } else {
                    $tgl = Carbon::createFromFormat('Y-m-d', $p->tmt_cpns)->addYears(1);
                }
                $temp = [
                    'nama' => $p->nama,
                    'kgb_terakhir' => '-',
                    'kgb_selanjutnya' => $tgl->format('Y-m-d')
                ];
                array_push($data, $temp);
            }
        }
        $kgbs = json_decode(collect($data)->toJson());
        
        return view('kgb.kgb-monitoring', compact('kgbs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::select('nip', 'nama', 'id_golongan', 'tmt_cpns')->get();

        return view('kgb.kgb-kelola', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pegawai $pegawai)
    {
        $pegawais = Pegawai::select('nip', 'nama')->get();
        return view('kgb.kgb-create', compact('pegawai', 'pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kgb = new dokumen_kgb();
        $kgb->no_surat = $request->nomor_surat;
        $kgb->tgl_kgb = $request->tgl_kgb;
        $kgb->nip = $request->nip;
        $kgb->save();

        $gaji = Gaji::where('nip', '=', $request->nip)->first();
        if ($gaji->isEmpty) {
            $gaji = new Gaji();
        }
        $gaji->gaji = $request->gaji_baru;
        $gaji->nip = $request->nip;
        $gaji->save();
        
        return redirect()->route('kgb.kelola');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate(Request $request)
    {
        $pegawai = Pegawai::find($request->nip);
        $nomor_surat = $request->nomor_surat;
        $nomor_surat_sk = $request->nomor_surat_sk;
        $today = Carbon::now()->formatLocalized('%d %B %Y');
        $gaji_lama = number_format($request->gaji_lama, 0, ',', '.');
        $gaji_lama_text = $request->gaji_lama_text;
        $gaji_baru = number_format($request->gaji_baru, 0, ',', '.');
        $gaji_baru_text = $request->gaji_baru_text;
        $tgl_kgb = Carbon::parse($request->tgl_kgb)->formatLocalized('%d %B %Y');
        $pimpinan = Pegawai::find($request->pimpinan);
        $tgl_sk_terakhir = Carbon::parse($request->tgl_sk_terakhir)->formatLocalized('%d %B %Y');
        $tgl_berlaku_sk = Carbon::parse($request->tgl_berlaku_sk)->formatLocalized('%d %B %Y');
        if ($request->tahun_sk >= 10) {
            $tahun_sk = $request->tahun_sk;
        } else {
            $tahun_sk = "0".$request->tahun_sk;
        }
        if ($request->bulan_sk >= 10) {
            $bulan_sk = $request->bulan_sk;
        } else {
            $bulan_sk = "0".$request->bulan_sk;
        }
        if ($request->tahun >= 10) {
            $tahun = $request->tahun;
        } else {
            $tahun = "0".$request->tahun;
        }
        if ($request->bulan >= 10) {
            $bulan = $request->bulan;
        } else {
            $bulan = "0".$request->bulan;
        }

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('a4', 'potrait')->loadview('kgb.surat-kgb', compact('pegawai', 'nomor_surat', 'today', 'gaji_lama', 'gaji_baru', 'gaji_lama_text', 'gaji_baru_text', 'tgl_kgb', 'pimpinan', 'tgl_sk_terakhir', 'nomor_surat_sk', 'tgl_berlaku_sk', 'tahun_sk', 'bulan_sk', 'tahun', 'bulan'));
        return $pdf->stream("kgb-".$pegawai->nama.".pdf");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(pegawai $pegawai)
    {
        $doc_kgbs = $pegawai->kgbs->all();

        return view('kgb.kgb-pegawai', compact('pegawai', 'doc_kgbs'));
    }

    /**
     * upload dokumen KGB.
     *
     * @param  \App\dokumen_kgb  $dokumen_kgb
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $kgb = dokumen_kgb::find($request->id_doc);
        if ($request->hasFile('doc_kgb')) {
            $request->doc_kgb->move('kgb', $request->doc_kgb->getClientOriginalName());
            $kgb->file_loc = "/kgb/".$request->doc_kgb->getClientOriginalName();
            $kgb->save();
        }
        
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dokumen_kgb  $dokumen_kgb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dokumen_kgb $dokumen_kgb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dokumen_kgb  $dokumen_kgb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $kgb = dokumen_kgb::find($request->id_doc);
        if ($kgb->file_loc) {
            File::delete(public_path($kgb->file_loc));
        }
        $kgb->delete();

        return redirect()->back();
    }
}
