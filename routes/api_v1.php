<?php

use App\Http\Controllers\Api\V1\CompaniesApiController;
use App\Http\Controllers\Api\V1\CompanyAssignedToApiController;
use App\Http\Controllers\Api\V1\CompanyContactsApiController;
use App\Http\Controllers\Api\V1\CompanyNotesApiController;
use App\Http\Controllers\Api\V1\ContactsApiController;
use App\Http\Controllers\Api\V1\NotesApiController;
use App\Http\Controllers\Api\V1\UsersApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - V1
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['as' => 'api.v1'], function() {
    Orion::resource('companies', CompaniesApiController::class)->withSoftDeletes();
    Orion::hasManyResource('companies', 'contacts', CompanyContactsApiController::class);
    Orion::belongsToResource('companies', 'assignedTo', CompanyAssignedToApiController::class);
    Orion::morphManyResource('companies', 'notes', CompanyNotesApiController::class);

    Orion::resource('contacts', ContactsApiController::class)->withSoftDeletes();
    Orion::resource('users', UsersApiController::class)->withSoftDeletes();
});
