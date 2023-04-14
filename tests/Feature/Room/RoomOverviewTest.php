<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoomOverviewTest extends TestCase {
    use RefreshDatabase;
    
    // TODO: when policies are implemented, make tests for the different roles

    public function test_page_loads() {
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
        $user = User::factory()->create();

        $response = (
            $this->actingAs($user)
                ->get('/room/overview')
        );

        $response->assertSee(['Rooms', 'Details', 'Search']);
    }
}