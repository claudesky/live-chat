<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private $base_uri = '/api/login';

    public function test_login_works()
    {
        $user = User::create([
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => bcrypt('password'),
        ]);

        $uri = $this->base_uri;

        $payload = [
            'email' => 'test@example.org',
            'password' => 'password',
        ];

        $response = $this->json(
            'POST',
            $uri,
            $payload,
        );

        $response->assertStatus(200);

        $this->assertTrue(
            auth()->check(),
            'No user is logged in'
        );

        $this->assertEquals(
            $user->id,
            auth()->user()->id,
            'The wrong user is logged in'
        );
    }

    public function test_valid_login_returns_user()
    {
        $user = User::create([
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => bcrypt('password'),
        ]);

        $uri = $this->base_uri;

        $payload = [
            'email' => 'test@example.org',
            'password' => 'password',
        ];

        $response = $this->json(
            'POST',
            $uri,
            $payload,
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

    public function test_invalid_login_fails()
    {
        $user = User::create([
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => bcrypt('password'),
        ]);

        $uri = $this->base_uri;

        $payload = [
            'email' => 'test@example.org',
            'password' => 'wrongpassword',
        ];

        $response = $this->json(
            'POST',
            $uri,
            $payload,
        );

        $response->dump();

        $response->assertStatus(401);

        $this->assertFalse(
            auth()->check(),
            'A user is logged in but not supposed to be'
        );
    }
}
