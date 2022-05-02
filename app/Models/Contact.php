<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use App\Traits\BelongsToTeam;
use App\Traits\CanBeAssignedToUser;
use App\Traits\CreatedByAUser;
use App\Traits\HasNotes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use BelongsToCompany;
    use CanBeAssignedToUser;
    use CreatedByAUser;
    use HasFactory;
    use HasNotes;
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
