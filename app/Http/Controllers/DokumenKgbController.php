<?php

namespace App\Http\Controllers;

use App\dokumen_kgb;
use App\Pegawai;
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
        $pegawai = Pegawai::select('nip', 'nama')->get();
        $data = array();
        foreach ($pegawai as $i => $p) {
            if ($p->kgbs->count() > 0) {
                $tgl = Carbon::createFromFormat('Y-m-d', $p->kgbs->first()->tgl_kgb);
                $temp = [
                    'nama' => $p->nama,
                    'kgb_terakhir' => $tgl->format('Y-m-d'),
                    'kgb_selanjutnya' => $tgl->addYears(2)->format('Y-m-d')
                ];
                array_push($data, $temp);
            } else {
                $temp = [
                    'nama' => $p->nama,
                    'kgb_terakhir' => '-',
                    'kgb_selanjutnya' => '-'
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
