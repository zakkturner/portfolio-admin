<?php

namespace Tests\Controllers\Api\FormSubmission;

use App\Models\FormSubmission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    public function test_users_can_post_to_api_route(){
       $response = $this->post('/api/v1/submissions');
       $response->assertStatus(302);
    }

    public function test_users_can_post_to_api_route_with_valid_data(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/api/v1/submissions',
        [
            'name' => 'Jane Doe',
            'email' => 'janedoe@gmail.com',
            'message' => 'This is a test message'
        ]
        );
        $response->assertStatus(200);
    }
    public function test_incorrect_data_sends_error(){
        $response = $this->post('/api/v1/submissions',[
           'name' => 'Jane Doe',
           'email' => 'janedoe@gmail.com',
        ]);
        $response->assertStatus(302);
}
}
