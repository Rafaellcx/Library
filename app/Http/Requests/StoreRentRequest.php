<?php

namespace App\Http\Requests;

use App\Http\Helpers\JsonFormat;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'devolution_date' => ['required', 'date'],
            'client_id' => ['required', 'integer', 'exists:clients,id'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            JsonFormat::error('Validate Field(s) fail.', $validator->getMessageBag()->toArray(), 422)
        );
    }
}
