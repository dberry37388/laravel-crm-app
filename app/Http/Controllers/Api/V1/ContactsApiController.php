<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Contact;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class ContactsApiController extends Controller
{
    use DisableAuthorization;

    protected $model = Contact::class;
}
