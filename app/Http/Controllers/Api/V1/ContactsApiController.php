<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Contact;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;
use Orion\Http\Controllers\Controller;

class ContactsApiController extends Controller
{
    use DisablePagination;

    protected $model = Contact::class;

    /**
     * The attributes that are used for filtering.
     *
     * @return array
     */
    public function filterableBy() : array
    {
        return ['company_id', 'first_name', 'last_name', 'email'];
    }

    /**
     * The attributes that are used for searching.
     *
     * @return array
     */
    public function searchableBy() : array
    {
        return ['first_name', 'last_name', 'email'];
    }
}
