<?php

namespace Tests\Feature\Room;

use Database\Seeders\BedConfigurationSeeder;
use Database\Seeders\RoomBedConfigurationSeeder;
use Database\Seeders\RoomViewSeeder;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\RoomSeeder;
use Database\Seeders\RoomTypeSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomEditTest extends TestCase {
    use RefreshDatabase;

    // TODO: when policies are implemented, make tests for the different roles

    public function test_page_loads() {
        $this->seed([
            RoomSeeder::class,
            RoomTypeSeeder::class,
            RoomViewSeeder::class,
            RoomBedConfigurationSeeder::class,
            BedConfigurationSeeder::class,
        ]);

        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/room/1/edit');

        $response->assertStatus(200);
    }

    public function test_page_redirects_to_login_when_guest() {
        $response = $this->get('/room/1/edit');

        $response->assertRedirect('/login');
    }

    public function test_page_contains_expected_content() {
        $user = User::factory()->create();

        $response = (
            $this->actingAs($user)
                ->get('/room/1/edit')
        );

        $response->assertSee(['Edit room', 'Cancel', 'Save']);
    }
}