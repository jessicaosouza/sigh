<?php

namespace App\Http\Requests;

use App\Helpers\Utilities;
use App\Services\AccessControlService;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return AccessControlService::can('CadastrarUsuarios');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'rg' => ['required', 'string', 'max:10'],
            'cpf' => ['required', 'string', 'max:11'],
            'cnh' => ['nullable', 'string', 'max:10'],
            'cnh_file' => ['nullable','required_with:cnh', 'file:pdf','max:2000'],
            'level_id' => ['required', 'exists:levels,id'],
            'role_id' => ['required', 'exists:roles,id'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'rg' => $this->rg ? Utilities::removeSpecialChars($this->rg) : NULL,
            'cpf' => $this->cpf ? Utilities::removeSpecialChars($this->cpf) : NULL
        ]);
    }
}
