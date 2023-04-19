<?php

namespace Tests\Feature\Room;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomOverviewTest extends TestCase {
    use RefreshDatabase;

    // TODO: when page variation for housekeeping is built, test per role

    public function test_page_loads() {
        // Create a user, log in (act) as that user and go to room overview, then check if the server returns a page

        $this->seed([
            RoleSeeder::class,
        ]);

        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/room/overview');

        $response->assertStatus(200);
    }

    public function test_page_redirects_to_login_when_guest() {
        $response = $this->get('/room/overview');

        $response->assertRedirect('/login');
    }

    public function test_page_contains_expected_content() {
        // Create a user, log in (act) as that user and go to room overview, then check if some specific content is shown on page
        $user = User::factory()->create();

        $response = (
            $this->actingAs($user)
                ->get('/room/overview')
        );

        $response->assertSee(['Rooms', 'Details', 'Search']);
    }
}