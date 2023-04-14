<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomInfoTest extends TestCase {
    use RefreshDatabase;

    // TODO: when policies are implemented, make tests for the different roles

    public function test_page_loads() {
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
        $user = User::factory()->create();

        $response = (
            $this->actingAs($user)
                ->get('/room/1/info')
        );

        $response->assertSee(['Room info', 'Capacity', 'Description', 'Edit', 'Back']);
    }
}