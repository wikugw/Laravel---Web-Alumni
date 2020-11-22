<?php

namespace App\Http\Controllers;

use App\Cerita;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;

class APIController extends Controller
{
    public function cerita()
    {
        $this->data['ceritas'] = Cerita::with('user')->orderBy('id', 'desc')->get();
        foreach ($this->data['ceritas'] as $cerita) {
            $cerita->foto = url('storage/' . $cerita->foto);
        }
        return response()->json($this->data);
    }

    public function bacaCerita($id)
    {
        $this->data['cerita'] = Cerita::with('user.user_detail')->findOrFail($id);
        $this->data['cerita']->foto = url('storage/' . $this->data['cerita']->foto);
        $this->data['cerita']->user->user_detail->foto = url('storage/' . $this->data['cerita']->user->user_detail->foto);
        return response()->json($this->data);
    }

    public function alumni()
    {
        $this->data['alumnis'] = User::with('cerita', 'user_detail')->where('isAdmin', 0)->orderBy('id', 'desc')->get();
        foreach ($this->data['alumnis'] as $alumni) {
            $alumni->user_detail->foto = url('storage/' . $alumni->user_detail->foto);
        }
        return response()->json($this->data);
    }

    public function detailAlumni($id)
    {
        $this->data['alumni'] = User::with('cerita.user', 'user_detail')->findOrFail($id);
        $this->data['alumni']->user_detail->foto = url('storage/' . $this->data['alumni']->user_detail->foto);
        foreach ($this->data['alumni']->cerita as $cerita) {
            $cerita->foto = url('storage/' . $cerita->foto);
        }
        return response()->json($this->data);
    }
}