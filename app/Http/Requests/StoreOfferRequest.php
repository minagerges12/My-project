<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //'Product_Id' => 'required|numeric',
            'Description' => ['required', 'string', 'max:255'],
            //'Image' => 'required|mimes:jpg,bmp,png',
            //'Qty' => ['required', 'numeric'],
            //'Total' => ['required', 'numeric'],
        ];
    }
}
