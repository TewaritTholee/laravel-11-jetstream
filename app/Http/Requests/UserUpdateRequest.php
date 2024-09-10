<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, string>
     */
    // public function rules(): array
    // {
    //     return [
    //         'name'     => 'required|string|max:255',
    //         'username' => 'required|string|max:255|unique:users,username,' . $this->route('user'),
    //         'email'    => 'required|email|max:255|unique:users,email,' . $this->route('user'),
    //     ];
    // }

    // UserUpdateRequest.php
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $this->route('user'),
            'email'    => 'required|email|max:255|unique:users,email,' . $this->route('user'),
        ];
    }

}

