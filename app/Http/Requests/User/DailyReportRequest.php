<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DailyReportRequest extends FormRequest
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
            'search-month' => 'sometimes|required|date',
            'reporting_time' => 'sometimes|required|date',
            'title' => 'sometimes|required|max:30|string|',
            'content' => 'sometimes|required|max:1000|string'
        ];
    }
  
    public function messages()
    {
        return [
            'reporting_time' => '入力必須の項目です。',
            'title.required' => '入力必須の項目です。',
            'content.required' => '入力必須の項目です。'
        ];
    }
}

