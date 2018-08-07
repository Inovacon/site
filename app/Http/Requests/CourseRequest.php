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
            'price' => 'required',
            'minimum_students' => 'required',
            'maximum_students' => 'required',
            'hours' => 'required',
            'course_type_id' => 'required',
            'modality_id' => 'required',
            'shift_id' => 'required',
            'occupation_area_id' => 'required',
            'target_audience_id' => 'required',
            'image_path' => 'sometimes|nullable|image',
            'active' => 'sometimes',
        ];
    }

    /**
     * Get all the input from the request.
     *
     * @return array
     */
    public function getAll()
    {
        abort_if($this->uploadedImageIsInvalid(), 500, 'O arquivo de imagem é inválido.');

        $this->request->set('active', $this->has('active'));

        return $this->only(array_keys($this->rules()));
    }

    /**
     * Determine whether the uploaded image is invalid.
     *
     * @return bool
     */
    protected function uploadedImageIsInvalid()
    {
        return $this->hasFile('image_path') && ! $this->file('image_path')->isValid();
    }
}
