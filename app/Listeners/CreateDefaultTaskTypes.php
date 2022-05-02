<?php

namespace App\Listeners;

use App\Models\TaskType;
use \Laravel\Jetstream\Events\TeamCreated;

class CreateDefaultTaskTypes
{
    /**
     * Handle the event.
     *
     * @param TeamCreated $event
     * @return void
     */
    public function handle(TeamCreated $event): void
    {
        TaskType::createDefaultsForTeam($event->team);
    }
}
