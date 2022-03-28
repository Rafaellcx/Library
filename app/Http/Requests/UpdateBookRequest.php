<?php

namespace App\Http\Requests;

use App\Http\Helpers\JsonFormat;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateBookRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:books,id'],
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'description' => ['required', 'string'],
            'year_edition' => ['required', 'integer'],
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            JsonFormat::error('Validate Field(s) fail.', $validator->getMessageBag()->toArray(), 422)
        );
    }
}
