<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Company;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class CompanyNotesApiController extends RelationController
{
    /**
     * Fully-qualified model class name
     */
    protected $model = Company::class;

    /**
     * Name of the relationship as it is defined on the model
     */
    protected $relation = 'notes';
}
