<?php

namespace App\Http\Requests;

use App\Services\AccessControlService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return AccessControlService::can('EditarUsuarios');

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
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'department_id' => ['required', 'exists:departments,id'],
            'level_id' => ['required', 'exists:levels,id'],
            'role_id' => ['required', 'exists:roles,id'],
        ];
    }
}
