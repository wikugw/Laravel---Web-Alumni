<?php

namespace App\Http\Controllers;

use App\Cerita;
use Illuminate\Http\Request;
use App\UserDetail;
use Auth;
use Alert;
use App\Http\Requests\ceritaRequest;
use Telegram\Bot\Laravel\Facades\Telegram;
use App\User;

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
    public function store(ceritaRequest $request)
    {
        $cerita = $request->except('_token');
        $cerita['user_id'] = Auth::user()->id;
        

        if ($request->has('foto')) {
            $cerita['foto'] = $request->file('foto')->store(
                'assets/cerita',
                'public'
            );
        }

        $cerita = Cerita::create($cerita);
        
        $penulisDetail = UserDetail::where('user_id', Auth::user()->id)->first();
        $penulis = User::findOrFail(Auth::user()->id);
        $link = route('cerita.detail', $cerita->id);

        $text = "<b>$penulis->name</b> dari angkatan <b>$penulisDetail->angkatan</b> telah menulis sebuah cerita dengan judul\n"
            . "<b>$cerita->judul</b>\n"
            . "tekan link dibawah untuk mulai membaca!\n"
            . $link;

        // -1001392622321.0
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', -1001392622321.0),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

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
    public function update(ceritaRequest $request, $cerita)
    {
        $updatedCerita = Cerita::findOrFail($cerita);

        $params = $request->except('_token');

        if ($request->has('foto')) {
            $params['foto'] = $request->file('foto')->store(
                'assets/cerita',
                'public'
            );
        }

        $updatedCerita->update($params);

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
