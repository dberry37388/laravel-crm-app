<?php

namespace App\Models;

use App\Models\Scopes\TeamScope;
use App\Traits\BelongsToTeam;
use App\Traits\CanBeAssignedToUser;
use App\Traits\CreatedByAUser;
use App\Traits\HasNotes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use BelongsToTeam;
    use CanBeAssignedToUser;
    use CreatedByAUser;
    use HasFactory;
    use HasNotes;

    protected $fillable = [
        'name'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new TeamScope);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }
}
