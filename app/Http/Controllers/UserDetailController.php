<?php

namespace App\Http\Controllers;

use App\UserDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Address;
use App\City;
use App\Http\Requests\UserDetailRequest;
use App\Province;

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
        $this->data['userDetail'] = null;
        $this->data['provinces'] = Province::all();
        $this->data['cities'] = City::all();
        return view('admin.userDetails.create', $this->data);
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

        if ($request->has('foto')) {
            $userDetail['foto'] = $request->file('foto')->store(
                'assets/alumni',
                'public'
            );
        }

        $address = Address::create($userDetail);
        $userDetail = UserDetail::create($userDetail);

        Alert::success('Berhasil', 'Biodata berhasil diperbarui, sekarang anda dapat mulai menulis cerita! ');
        return redirect()->route('userdetails.show', Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show($userDetail)
    {
        $this->data['user'] = User::with('address.city', 'address.province')->find(Auth::user()->id);
        $this->data['userDetail'] = UserDetail::where('user_id', Auth::user()->id)->first();
        if ($this->data['userDetail']) {
            return view('admin.userDetails.index', $this->data);
        }
        return redirect()->route('userdetails.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $userDetail)
    {
        $this->data['provinces'] = Province::all();
        $this->data['cities'] = City::all();
        $this->data['user'] = User::find(Auth::user()->id);
        $this->data['address'] = Address::where('user_id', Auth::user()->id)->first();
        $this->data['userDetail'] = UserDetail::where('user_id', Auth::user()->id)->first();
        return view('admin.userDetails.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UserDetailRequest $request, $user)
    {
        $userDetail = $request->except('_token');

        if ($request->has('foto')) {
            $userDetail['foto'] = $request->file('foto')->store(
                'assets/alumni',
                'public'
            );
        }

        $updatedUser = User::findOrFail($user);
        $updatedUser->update($userDetail);

        $updatedUserDetail = UserDetail::where('user_id', $user)->first();

        $updatedUserDetail->update($userDetail);

        Alert::success('Update Sukses', 'Biodata berhasil diperbarui! ');
        return redirect()->route('userdetails.show', $user);
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
