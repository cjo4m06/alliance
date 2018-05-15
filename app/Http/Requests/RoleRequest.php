<?php

namespace App\Http\Requests;

use App\Entities\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
                'required',
                'string',
            ],
            'job' => [
                'required',
                Rule::in(collect(Role::JOBS)->keys()),
            ],
            'level' => [
                'required',
                'integer',
            ],
            'ac' => [
                'required',
                'integer',
            ],
            'hit' => [
                'required',
                'integer',
            ],
            'attack' => [
                'required',
                'integer',
            ],
        ];
    }
}
