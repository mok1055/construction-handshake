<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name'            => 'required',
            'start_date'      => 'required|date|date_format:Y-m-d|before:end_date',
            'end_date'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'                 => 'Er is zijn 1 of meerdere verplichte velden leeg.',
            'start_date.before'        => 'De startdatum moet voor de einddatum zijn.',
        ];
    }
}
