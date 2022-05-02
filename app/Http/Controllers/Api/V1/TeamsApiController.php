<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Team;

class TeamsApiController extends BaseApiController
{
    protected $model = Team::class;

    public function includes(): array
    {
       return ['taskTypes'];
    }
}
