<?php

namespace Tests\Feature\Room;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\RoomTypeSeeder;
use Database\Seeders\RoomViewSeeder;
use Database\Seeders\BedConfigurationSeeder;
use Database\Seeders\RoomBedConfigurationSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomOverviewTest extends TestCase {
    use RefreshDatabase;

    // TODO: when page variation for housekeeping is built, test per role

    public function page_loads_format(int $role_id) {
        // Create a user, log in (act) as that user and go to room overview, then check if the server returns a page

        $this->seed([
            RoomSeeder::class,
            RoomTypeSeeder::class,
            RoomViewSeeder::class,
            BedConfigurationSeeder::class,
            RoomBedConfigurationSeeder::class,
            RoleSeeder::class,
        ]);

        $user = User::factory()->create([
            'role_id' => $role_id
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/room/overview');

        $response->assertStatus(200);
    }

    public function test_page_loads_as_owner() {
        $this->page_loads_format(1);
    }

    public function test_page_loads_as_hotel_manager() {
        $this->page_loads_format(2);
    }

    public function test_page_loads_as_head_housekeeping() {
        $this->page_loads_format(3);
    }

    public function test_page_loads_as_housekeeping() {
        $this->page_loads_format(4);
    }

    public function test_page_loads_as_reception() {
        $this->page_loads_format(5);
    }

    public function test_page_redirects_to_login_when_guest() {
        $response = $this->get('/room/overview');

        $response->assertRedirect('/login');
    }

    public function page_contains_expected_content_format(int $role_id, array $expected_content, array $expected_hidden_content) {
        // Create a user, log in (act) as that user and go to room overview, then check if some specific content is shown on page
        $this->seed([
            RoomSeeder::class,
            RoomTypeSeeder::class,
            RoomViewSeeder::class,
            BedConfigurationSeeder::class,
            RoomBedConfigurationSeeder::class,
            RoleSeeder::class,
        ]);

        $user = User::factory()->create([
            'role_id' => $role_id,
        ]);

        $response = (
            $this->actingAs($user)
                ->get('/room/overview')
        );

        $response->assertSee($expected_content);
        $response->assertDontSee($expected_hidden_content);
    }

    public function test_page_contains_expected_content_as_owner() {
        $this->page_contains_expected_content_format(1, ['Home', 'Rooms', 'Reservations', 'Capacity', 'Details', 'Search', 'Make reservation', 'Nr.'], []);
    }

    public function test_page_contains_expected_content_as_hotel_manager() {
        $this->page_contains_expected_content_format(2, ['Home', 'Rooms', 'Reservations', 'Capacity', 'Details', 'Search', 'Make reservation', 'Nr.'], []);
    }
    public function test_page_contains_expected_content_as_head_housekeeping() {
        $this->page_contains_expected_content_format(3, ['Home', 'Rooms', 'Capacity', 'Details', 'Search', 'Nr.'], ['Reservations', 'Make reservation']);
    }

    public function test_page_contains_expected_content_as_housekeeping() {
        $this->page_contains_expected_content_format(4, ['Home', 'Rooms', 'Capacity', 'Details', 'Search', 'Nr.'], ['Reservations', 'Make reservation']);
    }

    public function test_page_contains_expected_content_as_reception() {
        $this->page_contains_expected_content_format(5, ['Home', 'Rooms', 'Reservations', 'Capacity', 'Details', 'Search', 'Make reservation', 'Nr.'], []);
    }
}