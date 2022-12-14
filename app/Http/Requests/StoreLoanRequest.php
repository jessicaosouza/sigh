<?php

namespace App\Http\Requests;

use App\Services\AccessControlService;
use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return AccessControlService::can('CadastrarEmprestimos');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lended_at' => ['required', 'date_format:"Y-m-d"'],
            'retrieved_at' => ['nullable', 'date_format:"Y-m-d"'],
            'asset_id' => ['required', 'exists:assets,id'],
            'lended_by' => ['required', 'exists:users,id'],
            'user_id' => ['required', 'exists:users,id'],
            'observations' => ['nullable', 'string', 'max:65535'],
        ];
    }
}
