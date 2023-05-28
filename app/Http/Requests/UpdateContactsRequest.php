<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactsRequest extends FormRequest
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
        $id = $this->route('contact'); // Obtém o ID do contato da rota

        return [
            'name' => 'required|min:5',
            'contact' => [
                'required',
                'numeric',
                'digits:9',
                Rule::unique('contacts', 'contact')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email')->ignore($id),
            ],
        ];
    }
}
