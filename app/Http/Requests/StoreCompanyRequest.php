<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:companies,name'],
            'trading_name' => ['required', 'string', 'max:255'],
            'domain' => ['required', 'string', 'max:100', 'unique:companies,domain'],
            'slug' => ['required', 'string', 'max:100', 'unique:companies,slug'],
        ];
    }
}
