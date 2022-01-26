<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GangaRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required',
            'url'=>'required|url',
            'id_category'=>'required|numeric|between:1,3',
            'price'=>'required|numeric|between:0.00,999999.99',
            'discount_price'=>'required|numeric|lt:price',
            'points'=>'required|numeric',
        ];
    }
}
