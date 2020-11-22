<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Alert;
use App\Address;
use Auth;
use Illuminate\Support\Facades\Http;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::all();
        return view('admin.users.index', $this->data);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Success Tile', 'Alumni ' . $user['name'] . ' Berhasil dihapus');
        return back();
    }

    public function authenticate($id)
    {
        $user = User::findOrFail($id);
        $user['isAuthenticated'] = true;
        $user->save();
        Alert::success('Success Tile', 'Alumni ' . $user['name'] . ' Berhasil diverifikasi');
        return back();
    }

    public function KirimSouvenir($id)
    {
        $this->data['user'] = User::findOrFail($id);
        $this->data['admin'] = User::findOrFail(Auth::user()->id);
        $this->data['userAddress'] = Address::where('user_id', $id)->first();
        $this->data['adminAddress'] = Address::where('user_id', Auth::user()->id)->first();

        $cek_ongkir['origin'] = (int)$this->data['adminAddress']['city_id'];
        $cek_ongkir['destination'] = (int)$this->data['userAddress']['city_id'];
        $cek_ongkir['weight'] = 1;
        $cek_ongkir['courier'] = 'jne';

        // cek ongkir
        $response = Http::asForm()->withHeaders([
            'key' => '599cde1abca841e4b74a85474c131392'
        ])->post('https://api.rajaongkir.com/starter/cost', $cek_ongkir);

        $this->data['services'] = $response['rajaongkir']['results'][0]['costs'];
        $this->data['courier'] = 'jne';
        // return $this->data;

        return view('admin.users.kirimSouvenir', $this->data);
    }
}
