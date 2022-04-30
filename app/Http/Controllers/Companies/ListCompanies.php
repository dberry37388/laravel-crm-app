<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ListCompanies extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Companies/ListCompanies');
    }
}
