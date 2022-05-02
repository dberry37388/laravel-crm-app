<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Contact;
use Orion\Http\Controllers\RelationController;

class ContactNotesApiController extends RelationController
{
    /**
     * Fully-qualified model class name
     */
    protected $model = Contact::class;

    /**
     * Name of the relationship as it is defined on the model
     */
    protected $relation = 'notes';
}
