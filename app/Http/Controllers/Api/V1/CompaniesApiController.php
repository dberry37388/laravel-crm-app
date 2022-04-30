<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;

class CompaniesApiController extends BaseApiController
{
    protected $model = Company::class;

    public function includes(): array
    {
       return ['contacts', 'assignedTo'];
    }
}
