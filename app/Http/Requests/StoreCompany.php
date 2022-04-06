<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
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
            'name' => 'required',
            'website' => 'required',
            'logo' => 'required|file|dimensions:min_width=100,min_height=100'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
                'name' => $this->get('company_name'),
                'website' => $this->get('company_website')
            ]);
    }
}
