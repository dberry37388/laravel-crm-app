<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Team;
use App\Models\User;;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::factory([
            'email' => 'john.doe@me.com',
            'name' => 'John Doe',
            'is_super_admin' => 1
        ])
            ->create();

        $teams = Team::factory(3)->create([
            'user_id' => $adminUser->id
        ]);

        foreach ($teams as $team) {
            Company::factory(5, [
                'team_id' => $team->id,
                'created_by' => $adminUser->id,
            ])
                ->hasContacts(10)
                ->create();
        }
    }
}
