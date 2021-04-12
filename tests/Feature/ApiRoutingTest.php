<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiRoutingTest extends TestCase
{
    use RefreshDatabase;

    private $base_uri = '/api/test';

    public function test_nonexistent_endpoint_returns_404()
    {
        $uri = $this->base_uri . '/nonexistent';

        $response = $this
            ->json(
                'GET',
                $uri
            );

        $response->assertStatus(404);
    }

    public function test_unauthenticated_endpoint_succeeds()
    {
        $uri = $this->base_uri . '/unauthenticated';

        $response = $this
            ->json(
                'GET',
                $uri
            );

        $response->assertSuccessful();
    }

    public function test_authenticated_endpoint_succeeds_when_authenticated()
    {
        $user = User::create([
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => bcrypt('password'),
        ]);

        $uri = $this->base_uri . '/authenticated';

        $response = $this
            ->actingAs($user)
            ->json(
                'GET',
                $uri
            );

        $response->assertSuccessful();
    }
}
