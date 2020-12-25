<?php

namespace AmrNRD\Commentable\Requests;

use Illuminate\Foundation\Http\FormRequest;
use CustomField;

class CustomFieldFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'body'      => ['required', 'string', 'max:255'],
            'parent_id' => ['nullable', 'numeric', 'exists:comments,id'],
        ];
        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'body'                    => __('main.label'),
            'parent_id'               => __('main.name'),
        ];
    }
}
