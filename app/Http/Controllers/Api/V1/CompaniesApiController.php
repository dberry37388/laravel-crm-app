<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\v1\ContactRequest;
use App\Models\Company;

class CompaniesApiController extends BaseApiController
{
    protected $model = Company::class;

    protected $request = ContactRequest::class;

    public function includes(): array
    {
       return ['contacts', 'assignedTo'];
    }
}
