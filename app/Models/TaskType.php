<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use App\Traits\CreatedByAUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    use BelongsToCompany;
    use CreatedByAUser;
    use HasFactory;

    public static function createDefaultsForTeam($team)
    {
        foreach (config('defaults.task_types') as $taskType) {
            TaskType::create([
                'team_id' => $team->id,
                'created_by_id' => $team->user_id,
                'name' => $taskType
            ]);
        }
    }
}
