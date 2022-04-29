<?php

namespace App\Http\Controllers\Teams;

use App\Models\Team;
use Inertia\Inertia;

class CreateInitialTeamController extends Team
{
    public function __invoke()
    {
        return Inertia::render('');
    }
}
