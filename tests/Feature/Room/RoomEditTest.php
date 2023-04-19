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

    public function test_page_loads() {
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
            'role_id' => 1,
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/room/1/edit');

        $response->assertStatus(200);
    }

    public function test_page_redirects_to_info_with_role_reception() {
        // log in as reception, check if the authorization blocks this request

        $this->seed([
            RoleSeeder::class,
        ]);

        $user = User::factory()->create([
            'role_id' => 5,
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/room/1/edit');

        $response->assertRedirect('/room/1/info');
    }

    public function test_page_redirects_to_login_when_guest() {
        $response = $this->get('/room/1/edit');

        $response->assertRedirect('/login');
    }

    public function test_page_contains_expected_content() {
        // Create a user, log in (act) as that user and go to page, then check if some specific content is shown on page
        $user = User::factory()->create([
            'role_id' => 1,
        ]);

        $response = (
            $this->actingAs($user)
                ->get('/room/1/edit')
        );

        $response->assertSee(['Edit room', 'Cancel', 'Save']);
    }
}