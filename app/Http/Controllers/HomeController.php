<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function alumni()
    {
        $this->data['alumnis'] = User::all();
        foreach ($this->data['alumnis'] as $alumni) {
            $alumniId[] = $alumni->id;
        }
        $this->data['alumniDetails'] = UserDetail::whereIn('user_id', $alumniId)->get();
        return view('user.alumni', $this->data);
    }

    public function alumniDetail($id)
    {
        $this->data['alumniDetail'] = UserDetail::where('user_id', $id)->first();
        return view('user.alumniDetail', $this->data);
    }
}
