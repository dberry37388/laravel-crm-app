<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\v1\TaskTypeRequest;
use App\Models\TaskType;
use Orion\Http\Controllers\Controller;

class TaskTypesApiController extends Controller
{
    protected $model = TaskType::class;

    protected $request = TaskTypeRequest::class;

    /**
     * The attributes that are used for filtering.
     *
     * @return array
     */
    public function filterableBy() : array
    {
        return [];
    }

    /**
     * The attributes that are used for searching.
     *
     * @return array
     */
    public function searchableBy() : array
    {
        return ['title'];
    }

    public function sortableBy() : array
    {
        return ['created_at', 'created_at', 'updated_at'];
    }
}
