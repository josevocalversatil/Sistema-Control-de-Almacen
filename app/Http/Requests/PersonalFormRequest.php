<?php

namespace sisAlmacen1\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalFormRequest extends FormRequest
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
            //

            'iddepartamento'=>'required',
            'nombre'=>'required|max:45',
            'telefono'=>'max:45',
            'email'=>'max:45',
            'puesto'=>'max:100'





        ];
    }
}
