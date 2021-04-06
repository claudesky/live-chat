<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    private $base_uri = '/api/register';

    public function test_registration_works()
    {
        $uri = $this->base_uri;

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
        $uri = $this->base_uri;

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

    public function test_logged_in_user_cannot_register()
    {
        $existing_user = User::create([
            'email' => 'user@example.org',
            'name' => 'Jane Doe',
            'password' => bcrypt('password'),
        ]);

        $uri = $this->base_uri;

        $payload = [
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this
            ->actingAs($existing_user)
            ->json(
                'POST',
                $uri,
                $payload,
            );

        $response->assertStatus(403);
    }

    public function test_user_can_login_after_registration()
    {
        $registration_uri = $this->base_uri;

        $login_uri = '/api/login';

        $registration_payload = [
            'email' => 'test@example.org',
            'name' => 'John Doe',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $login_payload = [
            'email' => 'test@example.org',
            'password' => 'password',
        ];

        // Registration request
        $registration_response = $this->json(
            'POST',
            $registration_uri,
            $registration_payload,
        );

        $registration_response->assertSuccessful();

        // Login request
        $login_response = $this->json(
            'POST',
            $login_uri,
            $login_payload,
        );

        $login_response->assertSuccessful();
    }
}
