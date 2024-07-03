<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

    class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'title' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages():array
    {
        return[
            'category_id.required' => 'The Category field is required.',
            'user_id.required' => 'The Author field is required.',
        ];
    }
}
