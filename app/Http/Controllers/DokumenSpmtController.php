<?php

namespace App\Http\Controllers;

use App\dokumen_spmt;
use App\Pegawai;
use App\Golongan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class DokumenSpmtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monitoring()
    {
        // $pegawai = Pegawai::with('spmts')->select('nip', 'nama')->get();

        $pegawai = Pegawai::select('nip', 'nama')->get();
        $data = array();
        foreach ($pegawai as $i => $p) {
            if ($p->spmts->count() > 0) {
                $tgl = Carbon::createFromFormat('Y-m-d', $p->spmts->first()->tgl_spmt);
                $temp = [
                    'nama' => $p->nama,
                    'tgl_spmt' => $tgl->format('Y-m-d'),
                    'status' => 'Sudah Dibuat'
                ];
                array_push($data, $temp);
            } else {
                $temp = [
                    'nama' => $p->nama,
                    'tgl_spmt' => '-',
                    'status' => 'Belum Dibuat'
                ];
                array_push($data, $temp);
            }
        }
        $spmts = json_decode(collect($data)->toJson());
        
        return view('spmt.spmt-monitoring', compact('spmts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::select('nip', 'nama', 'tmt_cpns')->get();

        return view('spmt.spmt-kelola', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pegawai $pegawai)
    {
        $pegawais = Pegawai::select('nip', 'nama')->get();
        return view('spmt.spmt-create', compact('pegawai', 'pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = Pegawai::find($request->nip);
        $today = Carbon::now()->formatLocalized('%d %B %Y');
        $tgl_spmt = Carbon::parse($request->tgl_spmt)->formatLocalized('%d %B %Y');
        $nomor_surat = $request->nomor_surat;
        $sk_pusat = $request->sk_pusat;
        $tgl_sk_pusat = Carbon::parse($request->tgl_sk_pusat)->formatLocalized('%d %B %Y');
        $thn_sk_pusat = Carbon::parse($request->tgl_sk_pusat)->formatLocalized('%Y');
        $pimpinan = Pegawai::find($request->pimpinan);
        
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('a4', 'potrait')->loadview('spmt.surat-spmt', compact('pegawai', 'today', 'tgl_spmt', 'nomor_surat', 'pimpinan', 'sk_pusat', 'tgl_sk_pusat', 'thn_sk_pusat'));
        return $pdf->stream("spmt-".$pegawai->nama.".pdf");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dokumen_spmt  $dokumen_spmt
     * @return \Illuminate\Http\Response
     */
    public function show(dokumen_spmt $dokumen_spmt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dokumen_spmt  $dokumen_spmt
     * @return \Illuminate\Http\Response
     */
    public function edit(dokumen_spmt $dokumen_spmt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dokumen_spmt  $dokumen_spmt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dokumen_spmt $dokumen_spmt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dokumen_spmt  $dokumen_spmt
     * @return \Illuminate\Http\Response
     */
    public function destroy(dokumen_spmt $dokumen_spmt)
    {
        //
    }
}
