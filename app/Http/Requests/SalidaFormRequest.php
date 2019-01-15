<?php

namespace sisAlmacen1\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalidaFormRequest extends FormRequest
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
         'idpersonal'=>'required',
          'idpersonal2'=>'required',
           'cantidad'=>'required',
            'idarticulo'=>'required',
             'iddepartamento'=>'required',
             'cantidad'=>'required'



        ];
    }
}
