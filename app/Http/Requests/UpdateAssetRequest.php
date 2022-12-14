<?php

namespace App\Http\Requests;

use App\Services\AccessControlService;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return AccessControlService::can('CadastrarRecursos');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'series_number' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:65535'],
            'ordered_by' => ['required', 'exists:users,id'],
            'acquired_by' => ['required', 'exists:users,id'],
        ];
    }
}
