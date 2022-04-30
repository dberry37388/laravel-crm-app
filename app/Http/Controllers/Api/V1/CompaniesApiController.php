<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Company;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class CompaniesApiController extends Controller
{
    use DisableAuthorization;

    protected $model = Company::class;
}
