<?php

namespace App\Http\Controllers;

use App\Souvenir;
use App\User;
use App\Address;
use Mail;
use App\Mail\sendMail;
use Illuminate\Http\Request;
use Alert;

class SouvenirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['souvenirs'] = Souvenir::all();
        return view('admin.souvenirs.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $souvenir = $request->except('_token');
        $souvenir = Souvenir::create($souvenir);

        Alert::success('Berhasil', 'Berhasil menambahkan data pengiriman souvenir ');
        return redirect()->route('souvenir.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['souvenir'] = Souvenir::findOrFail($id);
        return view('admin.souvenirs.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'resi' => 'required|unique:souvenirs|max:191'
        ]);

        $souvenir = Souvenir::findOrFail($id);
        $souvenir->resi = $request->resi;
        $souvenir->save();

        $user = User::find($souvenir->user_id);
        $user->alamat = Address::where('user_id', $souvenir->user_id)->first();
        $user->souvenir = $souvenir;
        Mail::send(new sendMail($user));

        Alert::success('Berhasil', 'Resi berhasil ditambahkan dan email email telah dikirimkan kepada alumni');
        return redirect()->route('souvenir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
