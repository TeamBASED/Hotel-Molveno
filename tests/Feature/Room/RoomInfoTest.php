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

class RoomInfoTest extends TestCase {
    use RefreshDatabase;

    public function page_loads_format(int $role_id) {
        // Load all test data and go to page, check if the server returns a page, this also uses the roomPolicy to check for access

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
            ->get('/room/1/info');

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
        $response = $this->get('/room/1/info');

        $response->assertRedirect('/login');
    }

    public function page_contains_expected_content_format(int $role_id, array $expected_content, array $expected_hidden_content) {
        // Create a user, log in (act) as that user and go to page, then check if some specific content is shown on page

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
                ->get('/room/1/info')
        );

        $response->assertSee($expected_content);
        $response->assertDontSee($expected_hidden_content);
    }

    public function test_page_contains_expected_content_as_owner() {
        $this->page_contains_expected_content_format(1, ['Home', 'Rooms', 'Reservations', 'Room info', 'Room no.', 'Type', 'Capacity', 'Price per night', 'View', 'Beds', 'Description', 'Edit', 'Back'], []);
    }

    public function test_page_contains_expected_content_as_hotel_manager() {
        $this->page_contains_expected_content_format(2, ['Home', 'Rooms', 'Reservations', 'Room info', 'Room no.', 'Type', 'Capacity', 'Price per night', 'View', 'Beds', 'Description', 'Edit', 'Back'], []);
    }
    public function test_page_contains_expected_content_as_head_housekeeping() {
        $this->page_contains_expected_content_format(3, ['Home', 'Rooms', 'Room info', 'Room no.', 'Type', 'Capacity', 'Beds', 'Description', 'Back'], ['Reservations', 'Price per night', 'View', 'Reservation Schedule', 'Edit']);
    }

    public function test_page_contains_expected_content_as_housekeeping() {
        $this->page_contains_expected_content_format(4, ['Home', 'Rooms', 'Room info', 'Room no.', 'Type', 'Capacity', 'Beds', 'Description', 'Back'], ['Reservations', 'Price per night', 'View', 'Reservation Schedule', 'Edit']);
    }

    public function test_page_contains_expected_content_as_reception() {
        $this->page_contains_expected_content_format(5, ['Home', 'Rooms', 'Room info', 'Room info', 'Capacity', 'Description', 'Reservations', 'Reservation Schedule', 'Back'], ['Edit']);
    }


// Ik snap niet hoe je naar een specifieke button zoekt, dus deze test doet et nie :(

// public function test_page_hides_edit_button_as_reception() {
//     $this->seed([
//         RoomSeeder::class,
//         RoomTypeSeeder::class,
//         RoomViewSeeder::class,
//         RoomBedConfigurationSeeder::class,
//         BedConfigurationSeeder::class,
//         RoleSeeder::class,
//     ]);

//     $user = User::factory()->create([
//         'role_id' => 1,
//     ]);

//     $response = (
//         $this->actingAs($user)
//             ->get('/room/1/info')
//     );

//     $response->assertsee('class="button secondary-button">\r\nEdit\r\n</a>');
// }
}