<?php

namespace Controllers\Api\Projects;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{

    public function test_project_index_returns_a_200_response()
    {
        // Creating a user and authenticating as that user
        $user = User::factory()->create();
        $this->actingAs($user); // 'api' guard if you are using API authentication

        $response = $this->get('/api/v1/projects');
        $response->assertStatus(200);
    }

    public function test_project_index_returns_project_data()
    {
        Project::factory(10)->create();
        // Send a GET request to the endpoint
        $response = $this->get('/api/v1/projects');

        // Assert that the response status is 200
        $response->assertStatus(200);

        // Assert that the JSON response contains 10 items
        $response->assertJsonCount(10);

        // Verify the structure of each item in the JSON response
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'description',
                'created_at',
                'updated_at',
                'category_id',
                'freelance',
                'personal',
                'status',
                'img_src',
                'short_description',
                'site',
            ],
        ]);
    }

}
