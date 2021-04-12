<?php

namespace Tests\Feature;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class UserResourceTest extends TestCase
{
    use RefreshDatabase;

    private $base_uri = '/api/users';

    private $default_user_count = 10;

    private function seedUsers($user_count = null)
    {
        if (is_null($user_count)) {
            $user_count = $this->default_user_count;
        }

        User::factory($user_count)->create();
    }

    public function test_users_index_works()
    {
        $user_count = $this->default_user_count;

        $this->seedUsers($user_count);

        // Get the first user as our tester
        $user = User::first();

        $uri = $this->base_uri;

        $response = $this
            ->actingAs($user)
            ->json(
                'GET',
                $uri
            );

        $response->assertStatus(200);

        $response->assertJsonCount($user_count);

        $expected_content = (new UserResource(User::all()))->toArray(new Request());

        $response->assertJson($expected_content);
    }

    public function test_users_index_fails_when_unauthenticated()
    {
        $user_count = $this->default_user_count;

        $this->seedUsers($user_count);

        $uri = $this->base_uri;

        $response = $this
            ->json(
                'GET',
                $uri
            );

        $response->assertForbidden();
    }

    public function test_users_show_works()
    {
        $user_count = $this->default_user_count;

        $this->seedUsers($user_count);

        // Get the first user as our tester
        $user = User::first();

        // Get the second user as our subject
        $subject_user = User::find(2);

        $uri = $this->base_uri . "/$subject_user->id";

        $response = $this
            ->actingAs($user)
            ->json(
                'GET',
                $uri
            );

        $response->assertStatus(200);

        $expected_content = (new UserResource($subject_user))->toArray(new Request());

        $response->assertJson($expected_content);
    }
}
