<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class UsersApiController extends Controller
{
    use DisableAuthorization;

    protected $model = User::class;
}
