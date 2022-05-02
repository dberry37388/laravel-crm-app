<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\v1\NoteRequest;
use App\Models\Task;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller;

class TasksApiController extends Controller
{
    use DisablePagination;

    protected $model = Task::class;

    protected $request = NoteRequest::class;

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
        return ['title', 'description'];
    }

    public function sortableBy() : array
    {
        return ['created_at', 'completed_at'];
    }
}
