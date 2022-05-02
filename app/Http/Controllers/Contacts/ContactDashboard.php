<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Inertia\Inertia;

class ContactDashboard extends Controller
{
    public function __invoke(int $companyId)
    {
        return Inertia::render('Contacts/ContactDashboard', [
            'companyId' => $companyId
        ]);
    }
}
