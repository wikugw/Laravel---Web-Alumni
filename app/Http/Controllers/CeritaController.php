<?php

namespace App\Http\Controllers;

use App\Cerita;
use Illuminate\Http\Request;
use App\UserDetail;
use Auth;
use Alert;

class CeritaController extends Controller
{
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
        $this->data['userDetail'] = UserDetail::where('user_id', Auth::user()->id)->first();
        return view('admin.cerita.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cerita = $request->except('_token');
        $cerita['user_id'] = Auth::user()->id;
        $cerita = Cerita::create($cerita);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('admin/img/cerita/', $request->file('foto')->getClientOriginalName());
            $cerita->foto = $request->file('foto')->getClientOriginalName();
            $cerita->save();
        }
        Alert::success('Berhasil', 'Berhasil mempublis cerita! ');
        return redirect()->route('cerita.show', Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cerita  $cerita
     * @return \Illuminate\Http\Response
     */
    public function show($cerita)
    {
        $this->data['ceritas'] = Cerita::where('user_id', $cerita)->get();
        $this->data['userDetail'] = UserDetail::where('user_id', Auth::user()->id)->first();
        return view('admin.cerita.index', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cerita  $cerita
     * @return \Illuminate\Http\Response
     */
    public function edit($cerita)
    {
        $this->data['cerita'] = Cerita::findOrFail($cerita);
        $this->data['userDetail'] = UserDetail::where('user_id', Auth::user()->id)->first();
        return view('admin.cerita.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cerita  $cerita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cerita)
    {
        $updatedCerita = Cerita::findOrFail($cerita);

        $oldFoto = $updatedCerita->foto;

        if ($updatedCerita['foto'] === null) {
            $updatedCerita['foto'] = $oldFoto;
        }
        $params = $request->except('_token');
        $updatedCerita->update($params);

        if ($request->has('foto') && $request->foto != "undefined") {
            $request->file('foto')->move('admin/img/cerita/', $request->file('foto')->getClientOriginalName());
            $updatedCerita->foto = $request->file('foto')->getClientOriginalName();
            $updatedCerita->save();
        }
        Alert::success('Update Sukses', 'Biodata berhasil diperbarui! ');
        return redirect()->route('cerita.show', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cerita  $cerita
     * @return \Illuminate\Http\Response
     */
    public function destroy($cerita)
    {
        $hapusCerita = Cerita::findOrFail($cerita);
        $hapusCerita->delete();
        Alert::success('Berhasil', 'Cerita dengan judul  ' . $hapusCerita['judul'] . ' Berhasil dihapus');
        return redirect()->route('cerita.show', Auth::user()->id);
    }
}