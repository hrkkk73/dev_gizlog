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
            'title' => 'sometimes|required|string|max:30',
            'content' => 'sometimes|required|string|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'required' => '入力必須の項目です。',
            'reporting_time.date' => '日付を正しく入力してください。',
        ];
    }
}

