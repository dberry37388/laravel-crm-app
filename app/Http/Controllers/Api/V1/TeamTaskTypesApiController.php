<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Team;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\RelationController;

class TeamTaskTypesApiController extends RelationController
{
    use DisableAuthorization;

    /**
     * Fully-qualified model class name
     */
    protected $model = Team::class;

    /**
     * Name of the relationship as it is defined on the Post model
     */
    protected $relation = 'taskTypes';
}
