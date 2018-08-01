<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'target_audience' => 'required',
            'price' => 'required|numeric',
            'minimum_students' => 'required|integer',
            'maximum_students' => 'required|integer',
            'hours' => 'required|numeric',
            'course_type_id' => 'required',
            'modality_id' => 'required',
            'shift_id' => 'required',
            'occupation_area_id' => 'required',
        ];
    }

    /**
     * Get all the input from the request.
     *
     * @param  array|null $keys
     * @return array
     */
    public function all($keys = null)
    {
        return $this->only($keys ?: array_keys($this->rules()));
    }
}
