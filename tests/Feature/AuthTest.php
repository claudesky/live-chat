<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_works()
    {
        $uri = '/api/login';

        $payload = [
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->json(
            'POST',
            $uri,
            $payload,
        );

        $response->assertStatus(200);

        $this->assertDatabaseHas(
            'users',
            [
                'email' => $payload['email'],
                'name' => $payload['name'],
            ]
        );
    }

    public function test_invalid_password_confirmation_fails()
    {
        $uri = '/api/login';

        $payload = [
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => 'password',
            'password_confirmation' => 'wrongpassword',
        ];

        $response = $this->json(
            'POST',
            $uri,
            $payload,
        );

        $response->assertStatus(422);

        $response->assertJsonFragment([
            'errors' => [
                'password' => [
                    'The password confirmation does not match.',
                ],
            ]
        ]);

        $this->assertDatabaseCount('users', 0);
    }
}
