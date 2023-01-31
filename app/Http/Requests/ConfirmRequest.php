<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmRequest extends FormRequest
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
            'last_name' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'area' => ['required'],
            'phone' => ['required', 'integer'],
            'payment_method' => ['required'],
        ];
    }
}
