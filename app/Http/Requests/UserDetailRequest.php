<?php

namespace App\Http\Requests;

use App\UserDetail;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userDetail = UserDetail::where('user_id', Auth::user()->id)->first();
        if ($this->method() == 'PUT') {
            return [
                'name' => 'required|string|max:191',
                'email' => 'required|unique:users,email,' . Auth::user()->id . '|max:191',
                'alamat' => 'required',
                'angkatan' => 'required',
                'jurusan' => 'required',
                'no_hp' => 'required|numeric|digits:12',
                'facebook' => 'nullable|url',
                'twitter' => 'nullable|url',
                'instagram' => 'nullable|url',
                'foto' => 'nullable|image',
                'title' => 'required',
                'kelamin' => 'required'
            ];
        } else {
            return [
                'alamat' => 'required',
                'angkatan' => 'required',
                'jurusan' => 'required',
                'no_hp' => 'required|numeric|digits:12',
                'facebook' => 'nullable|url',
                'twitter' => 'nullable|url',
                'instagram' => 'nullable|url',
                'foto' => 'nullable|image',
                'title' => 'required',
                'kelamin' => 'required'
            ];
        }
    }
}
