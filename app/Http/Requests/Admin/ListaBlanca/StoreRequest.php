<?php

namespace App\Http\Requests\Admin\ListaBlanca;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'ip_address' => 'required|unique:firewall|ip',
            'usuario_id' => 'required|exists:usuario,id',
            'whitelisted' => 'required',
        ];
    }
}
