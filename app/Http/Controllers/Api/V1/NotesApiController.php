<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\v1\NoteRequest;
use App\Models\Contact;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller;

class NotesApiController extends Controller
{
    use DisablePagination;

    protected $model = Contact::class;

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
        return ['body'];
    }

    public function sortableBy() : array
    {
        return ['created_at'];
    }
}
