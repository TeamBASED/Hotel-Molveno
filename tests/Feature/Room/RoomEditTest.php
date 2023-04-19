<?php

namespace Tests\Feature\Room;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\RoomTypeSeeder;
use Database\Seeders\RoomViewSeeder;
use Database\Seeders\BedConfigurationSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Seeders\RoomBedConfigurationSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomEditTest extends TestCase {
    use RefreshDatabase;

    //TODO: Checken of er labels zijn toegevoegd aan de inputvelden.

    public function page_loads_format(int $role_id) {
        // Load all test data and go to page, check if the server returns a page

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

        $response = $this
            ->actingAs($user)
            ->get('/room/1/edit');

        $response->assertStatus(200);
    }

    public function test_page_loads_as_owner() {
        $this->page_loads_format(1);
    }

    public function test_page_loads_as_hotel_manager() {
        $this->page_loads_format(2);
    }

    public function page_redirects_to_info_page_format(int $role_id) {
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

        $response = $this
            ->actingAs($user)
            ->get('/room/1/edit');

        $response->assertRedirect('/room/1/info');
    }

    public function test_page_redirects_to_login_when_head_housekeeping() {
        $this->page_redirects_to_info_page_format(3);
    }

    public function test_page_redirects_to_login_when_housekeeping() {
        $this->page_redirects_to_info_page_format(4);
    }

    public function test_page_redirects_to_info_with_role_reception() {
        $this->page_redirects_to_info_page_format(5);
    }

    public function test_page_redirects_to_login_when_guest() {
        $response = $this->get('/room/1/edit');
        $response->assertRedirect('/login');
    }

    public function page_contains_expected_content_format(int $role_id, array $expected_content, array $expected_hidden_content) {
        // Create a user, log in (act) as that user and go to page, then check if some specific content is shown on page
        $user = User::factory()->create([
            'role_id' => $role_id,
        ]);

        $response = (
            $this->actingAs($user)
                ->get('/room/1/edit')
        );

        $response->assertSee($expected_content, $escaped = false);
        $response->assertDontSee($expected_hidden_content);
    }

    public function test_page_contains_expected_content_as_owner() {
        $this->page_contains_expected_content_format(1, ['Home', 'Rooms', 'Reservations', 'Edit Room', 'Room number', 'Capacity', 'Price per night', 'Single beds', 'Double beds', 'Baby bed possible', 'Room description', 'Room type', 'View type', 'Cancel', 'Save'], []);
    }

    public function test_page_contains_expected_content_as_hotel_manager() {
        $this->page_contains_expected_content_format(2, ['Home', 'Rooms', 'Reservations', 'Edit room', 'Room number', 'Capacity', 'Price per night', 'Single beds', 'Double beds', 'Baby bed possible', 'Room description', 'Room type', 'View type', 'Cancel', 'Save'], []);
    }


}