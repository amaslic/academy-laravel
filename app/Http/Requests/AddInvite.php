<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddInvite extends FormRequest
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
        return [
            'affiliate_id' => 'required',
            'affiliate_fname' => 'required',
            'affiliate_lname' => 'required',
            'affiliate_email' => 'required',
            'friend_fname' => 'required',
            'friend_lname' => 'required',
            'friend_email' => 'required',
        ];
    }
}
