<?php

use App\Http\Controllers\Api\V1\CompaniesApiController;
use App\Http\Controllers\Api\V1\CompanyAssignedToApiController;
use App\Http\Controllers\Api\V1\CompanyContactsApiController;
use App\Http\Controllers\Api\V1\CompanyNotesApiController;
use App\Http\Controllers\Api\V1\CompanyTasksApiController;
use App\Http\Controllers\Api\V1\TeamsApiController;
use App\Http\Controllers\Api\V1\TeamTaskTypesApiController;
use App\Http\Controllers\Api\V1\ContactNotesApiController;
use App\Http\Controllers\Api\V1\ContactsApiController;
use App\Http\Controllers\Api\V1\ContactTasksApiController;
use App\Http\Controllers\Api\V1\NotesApiController;
use App\Http\Controllers\Api\V1\TasksApiController;
use App\Http\Controllers\Api\V1\TaskTypesApiController;
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
    Orion::resource('teams', TeamsApiController::class)->withSoftDeletes();
    Orion::hasManyResource('companies', 'taskTypes', TeamTaskTypesApiController::class);

    Orion::resource('companies', CompaniesApiController::class)->withSoftDeletes();
    Orion::hasManyResource('companies', 'contacts', CompanyContactsApiController::class);
    Orion::belongsToResource('companies', 'assignedTo', CompanyAssignedToApiController::class);
    Orion::morphManyResource('companies', 'notes', CompanyNotesApiController::class);
    Orion::morphManyResource('companies', 'tasks', CompanyTasksApiController::class);

    Orion::resource('contacts', ContactsApiController::class)->withSoftDeletes();
    Orion::morphManyResource('contacts', 'notes', ContactNotesApiController::class);
    Orion::morphManyResource('contacts', 'tasks', ContactTasksApiController::class);

    Orion::resource('notes', NotesApiController::class)->withSoftDeletes();
    Orion::resource('tasks', TasksApiController::class)->withSoftDeletes();
    Orion::resource('task-types', TaskTypesApiController::class)->withSoftDeletes();

    Orion::resource('users', UsersApiController::class)->withSoftDeletes();
});
