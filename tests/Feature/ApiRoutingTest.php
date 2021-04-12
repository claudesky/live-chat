<?php

namespace Tests\Feature;

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
}
