<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ShowCompany extends Controller
{
    public function __invoke(int $companyId)
    {
        return Inertia::render('Companies/ShowCompany', [
            'companyId' => $companyId
        ]);
    }
}
