<?php

namespace sisAlmacen1\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoFormRequest extends FormRequest
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
            'idproveedor'=>'required',
            'idmemo'=>'required',
            'idpersonal'=>'required',
         'idpersonal2'=>'required',
            'numero_factura'=>'required',
            'cantidad'=>'required',
            'idarticulo'=>'required',
            'precio_unitario'=>'required',
            'precio_total'=>'required'


        ];
    }
}
