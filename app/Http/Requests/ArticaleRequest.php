<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticaleRequest extends FormRequest
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
            'title'      =>'required|string|min:3|max:100',
            'author'     => 'required|string|min:3|max:50',
            'categories' => 'required|array',
            'short_text' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Названия категории должно быть заполнено',
            'title.min' => 'Поле Название категории Должно БЫТЬ  минимально 4 символа',
            'author.min' => 'Имя  автора должна быть  от 3 символов',
            'author.max' => 'Имя  автора должна быть  до 50 символов',

        ];
    }

}
