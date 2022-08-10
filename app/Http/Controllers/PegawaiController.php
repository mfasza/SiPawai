<?php

namespace App\Http\Controllers;

use App\pegawai;
use App\golongan;
use App\User;
use App\Http\Requests\StorePegawai;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::select('nip', 'nama', 'jabatan', 'status', 'tmt_cpns', 'id_golongan')->get();

        return view('pegawai', compact(['pegawais']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongans = Golongan::select(['id', 'nama_golongan'])->get();
        return view('pegawai-create', compact('golongans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawai $request)
    {
        $validated = $request->validated();
        $pegawai = new Pegawai;
        $pegawai->nip = $validated['nip'];
        $pegawai->nama = $validated['nama'];
        $pegawai->jabatan = $validated['jabatan'];
        $pegawai->id_golongan = $validated['golongan'];
        $pegawai->tmt_cpns = $validated['tmt_cpns'];
        $pegawai->save();
        
        if ($validated['foto']) {
            $validated['foto']->move('img', $validated['foto']->getClientOriginalName());
        }

        $user = new User;
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->nip = $validated['nip'];
        $user->foto = "\img\\".$validated['foto']->getClientOriginalName();
        $user->save();

        return redirect()->route('pegawai.index');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect(route('pegawai.index'));
    }
}
