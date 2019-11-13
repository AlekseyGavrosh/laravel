<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'roles' => 'required',
            'name' => 'min:0|max:30',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:email',
            'password' => 'required|min:6'
        ];
    }

    protected function formatErrors(Validator $validator)
    {

        return $validator->errors()->all();
    }

    public function messages()
    {
        return [
            'roles.required' => ' Заполните роль пользователя',
            'name.max' => 'Имя пользователя не более 30 символов',
            'name.required' => 'Поле Имя должно быть заполнено',
            'name.min' => 'Поле Имя Должно БЫТЬ  минимально 4 символа',
            'password.required' => 'Заполните пароль пользователя',
            'password.min' => ' пароль должен быть от 6 символов'
        ];
    }
}
