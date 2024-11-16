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

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/api/v1/projects');
        $response->assertStatus(200);
    }

    public function test_project_index_returns_project_data()
    {
        Project::factory(10)->create();

        $response = $this->get('/api/v1/projects');


        $response->assertStatus(200);

        $response->assertJsonCount(10);


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
