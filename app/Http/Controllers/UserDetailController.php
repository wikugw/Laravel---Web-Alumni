<?php

namespace App\Http\Controllers;

use App\UserDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Http\Requests\UserDetailRequest;

class UserDetailController extends Controller
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
        return view('admin.userDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserDetailRequest $request)
    {
        $userDetail = $request->except('_token');
        $userDetail['user_id'] = Auth::user()->id;
        $userDetail = UserDetail::create($userDetail);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('admin/img/user/', $request->file('foto')->getClientOriginalName());
            $userDetail->foto = $request->file('foto')->getClientOriginalName();
            $userDetail->save();
        }
        Alert::success('Success Tile', 'Biodata berhasil diperbarui, sekarang anda dapat mulai menulis cerita! ');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        $this->data['user'] = User::find(Auth::user()->id);
        $this->data['userDetail'] = UserDetail::where('user_id', Auth::user()->id)->first();
        return view('admin.userDetails.index', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $userDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $userDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }
}
