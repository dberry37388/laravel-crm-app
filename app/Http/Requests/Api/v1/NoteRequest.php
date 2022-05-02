<?php

namespace App\Http\Requests\Api\v1;

use JetBrains\PhpStorm\ArrayShape;
use Orion\Http\Requests\Request;

class NoteRequest extends Request
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
    #[ArrayShape(['body' => "string"])] public function commonRules(): array
    {
        return [
            'body' => 'required'
        ];
    }
}
