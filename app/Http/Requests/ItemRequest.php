<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
                'integer',
            ],
            'once_price' => [
                'required',
                'integer',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '物品名稱',
            'price' => '起標價格',
            'once_price' => '一標最低價'
        ];
    }
}
