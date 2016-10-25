<?php

namespace App\Http\Requests\Admin\Periodo;

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
            'nombre'       => 'required|max:90',
            'fecha_inicio' => 'required|date',
            'fecha_fin'    => 'required|date',
            'tipo_id'      => 'required|exists:tipo_periodo,id',
            'facultad_id'  => 'required|exists:facultad,id',
        ];
    }
}
