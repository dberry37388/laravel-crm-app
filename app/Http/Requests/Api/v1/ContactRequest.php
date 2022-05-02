<?php

namespace App\Http\Requests\Api\v1;

use JetBrains\PhpStorm\ArrayShape;
use Orion\Http\Requests\Request;

class ContactRequest extends Request
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
    #[ArrayShape(['first_name' => "string", 'last_name' => "string", 'email' => "string", 'job_title' => "string", 'phone_number' => "string", 'mobile_number' => "string"])] public function commonRules(): array
    {
        return [
            'first_name' => 'required|max:300',
            'last_name' => 'required|max:300',
            'email' => 'required|email|max:300',
            'job_title' => 'max:300',
            'phone_number' => 'required|max:300',
            'mobile_number' => 'required|max:300',
        ];
    }
}
