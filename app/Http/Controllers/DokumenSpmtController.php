<?php

namespace App\Http\Controllers;

use App\dokumen_spmt;
use App\Pegawai;
use App\Golongan;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        return view('spmt.spmt-create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('spmt.surat-spmt');
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
