<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
              'title' => 'required|string|min:4|max:130',
          ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }


    public function messages()
    {
        return [
            'title.required' => 'Поле Названия категории должно быть заполнено',
            'title.min' => 'Поле Название категории Должно БЫТЬ  минимально 4 символа',
        ];
    }
}
