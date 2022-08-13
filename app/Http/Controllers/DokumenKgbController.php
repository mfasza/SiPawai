<?php

namespace App\Http\Controllers;

use App\dokumen_kgb;
use App\Pegawai;
use App\Golongan;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dokumen_kgb  $dokumen_kgb
     * @return \Illuminate\Http\Response
     */
    public function show(dokumen_kgb $dokumen_kgb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dokumen_kgb  $dokumen_kgb
     * @return \Illuminate\Http\Response
     */
    public function edit(dokumen_kgb $dokumen_kgb)
    {
        //
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
    public function destroy(dokumen_kgb $dokumen_kgb)
    {
        //
    }
}
