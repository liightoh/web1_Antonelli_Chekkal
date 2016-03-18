<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ValidatePostRequest extends Request
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
            'title' => 'required|min:10',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Le titre obligatoire',
            'title.min'      => 'Le titre doit être > 10 caractères',
            'content.required' => 'La decription obligatoire',
            'content.min'      => 'La description doit être > 10 caractères',
        ];
    }
}
