<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::check()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
            'technology_tags' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルが抜けています',
            'description.required' => '説明が抜けています',
            'technology_tags.required' => '技術タグが抜けています',
        ];
    }
}
