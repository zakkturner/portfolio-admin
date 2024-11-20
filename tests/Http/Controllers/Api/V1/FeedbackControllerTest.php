<?php

namespace Tests\Controllers\Api\Feedback;

use App\Http\Controllers\Api\V1\FeedbackController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeedbackControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_post_to_api_route(){
        $response = $this->post('/api/v1/feedback');
        $response->assertStatus(302);
    }
    public function test_user_can_submit_feedback(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/api/v1/feedback',[
            'rating' => 5,
            'email' => 'johndoe@example.com',
            'feedback' => 'your site is mid!'
        ]);
        $response->assertStatus(200);
    }
}
