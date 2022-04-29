<?php

namespace Tests\Feature\Http\Middleware;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnsureUserHasATeamTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_logged_in_user_without_a_team_is_redirected_to_team_create_page()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get(route('dashboard'));

        $response->assertRedirect(route('teams.create'));
    }
}
