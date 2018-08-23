<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest
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
            'first_day' => 'required',
            'last_day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'week_days' => 'required',
        ];
    }
}
