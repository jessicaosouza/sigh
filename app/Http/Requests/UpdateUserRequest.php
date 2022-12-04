<?php

namespace App\Http\Requests;

use App\Helpers\Utilities;
use App\Services\AccessControlService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return AccessControlService::can('EditarUsuarios');

    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'rg' => ['required', 'string', 'max:10'],
            'cpf' => ['required', 'string', 'max:11'],
            'cnh' => ['nullable', 'string', 'max:10'],
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
