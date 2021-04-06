<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SelfTest extends TestCase
{
    use RefreshDatabase;

    private $base_uri = '/api/self';

    public function test_self_works()
    {
        $user = User::create([
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => bcrypt('password'),
        ]);

        $uri = $this->base_uri;

        $response = $this
            ->actingAs($user)
            ->json(
                'GET',
                $uri
            );

        $response->assertStatus(200);

        $response->assertJsonFragment(
            $user->only([
                'id',
                'email',
                'name',
            ])
        );
    }

    public function test_self_fails_when_not_logged_in()
    {
        $user = User::create([
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => bcrypt('password'),
        ]);

        $uri = $this->base_uri;

        $response = $this
            ->json(
                'GET',
                $uri
            );

        $response->assertStatus(401);
    }
}
