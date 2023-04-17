<?php

namespace Tests\Feature;

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

    // TODO: when policies are implemented, make tests for the different roles

    public function test_page_loads() {
        // Load all test data and go to page, check if the server returns a page, this also uses the roomPolicy to check for access

        $this->seed([
            RoomSeeder::class,
            RoomTypeSeeder::class,
            RoomViewSeeder::class,
            RoomBedConfigurationSeeder::class,
            BedConfigurationSeeder::class,
            RoleSeeder::class,
        ]);

        $user = User::factory()->create([
            'role_id' => 1,
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/room/1/info');

        $response->assertStatus(200);
    }

    public function test_page_redirects_to_login_when_guest() {
        $response = $this->get('/room/1/info');

        $response->assertRedirect('/login');
    }

    public function test_page_contains_expected_content() {
        // Create a user, log in (act) as that user and go to page, then check if some specific content is shown on page

        $user = User::factory()->create();

        $response = (
            $this->actingAs($user)
                ->get('/room/1/info')
        );

        $response->assertSee(['Room info', 'Capacity', 'Description', 'Edit', 'Back']);
    }
}