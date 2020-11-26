<?php

namespace App\Http\Controllers;

use App\Cerita;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Facades\Http;
use Mail;
use App\Mail\sendMail;
use App\Address;
use App\Souvenir;

use Telegram\Bot\Laravel\Facades\Telegram;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['ceritas'] = Cerita::paginate(3);
        foreach ($this->data['ceritas'] as $cerita) {
            $cerita->foto = url('storage/' . $cerita->foto);
        }
        return view('user.home', $this->data);
    }

    public function cerita()
    {
        $this->data['ceritas'] = Cerita::all();
        foreach ($this->data['ceritas'] as $cerita) {
            $cerita->foto = url('storage/' . $cerita->foto);
        }
        return view('user.cerita', $this->data);
    }

    public function ceritaDetail($id)
    {
        $this->data['cerita'] = Cerita::findOrFail($id);
        $this->data['penulis'] = UserDetail::where('user_id', $this->data['cerita']->user_id)->first();
        $this->data['cerita']->foto = url('storage/' . $this->data['cerita']->foto);
        $this->data['penulis']->foto = url('storage/' . $this->data['penulis']->foto);
        return view('user.detailCerita', $this->data);
    }

    public function alumni()
    {
        $this->data['alumnis'] = User::where('isAdmin', '0')->get();
        if ($this->data['alumnis']->isNotEmpty()) {
            foreach ($this->data['alumnis'] as $alumni) {
                $alumniId[] = $alumni->id;
            }
            $this->data['alumniDetails'] = UserDetail::whereIn('user_id', $alumniId)->get();
            foreach ($this->data['alumniDetails'] as $alumniDetail) {
                $alumniDetail->foto = url('storage/' . $alumniDetail->foto);
            }
        } else {
            $this->data['alumniDetails'] = [];
        }
        return view('user.alumni', $this->data);
    }

    public function alumniDetail($id)
    {
        $this->data['alumniDetail'] = UserDetail::where('user_id', $id)->first();
        $this->data['alumniDetail']->foto = url('storage/' . $this->data['alumniDetail']->foto);
        $this->data['ceritas'] = Cerita::where('user_id', $id)->get();
        foreach ($this->data['ceritas'] as $cerita) {
            $cerita->foto = url('storage/' . $cerita->foto);
        }
        return view('user.alumniDetail', $this->data);
    }

    public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }


    public function getCitiesAjax($id)
    {
        $cities = City::where('province_id', '=', $id)->pluck('city_name', 'id');

        return json_encode($cities);
    }

    public function getService(Request $request)
    {
        $cek_ongkir['origin'] = (int)$request->origin;
        $cek_ongkir['destination'] = (int)$request->destination;
        $cek_ongkir['weight'] = 1;
        $cek_ongkir['courier'] = $request->service;

        // cek ongkir
        $response = Http::asForm()->withHeaders([
            'key' => '599cde1abca841e4b74a85474c131392'
        ])->post('https://api.rajaongkir.com/starter/cost', $cek_ongkir);

        $this->data['services'] = $response['rajaongkir']['results'][0]['costs'];
        return response()->json($this->data);
    }

    public function email($id)
    {
        $user = User::find($id);
        $user->alamat = Address::where('user_id', $id)->first();
        $user->souvenir = Souvenir::where('user_id', $id)->first();
        Mail::send(new sendMail($user));
    }
}
