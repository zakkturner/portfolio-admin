<?php

namespace Tests\Controllers\FormSubmission;

use App\Models\FormSubmission;
use Inertia\Testing\AssertableInertia;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{

    use RefreshDatabase;
    protected $seed = true;
    public function test_form_submissions_return_a_200_response()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/submissions');
        $response->assertStatus(200)
            ->assertInertia(fn(AssertableInertia $inertia) =>
            $inertia->component('Submissions/Index')
            );
    }

    public function test_form_submissions_has_submissions()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(route('submissions.index'));
        $submissions = FormSubmission::factory(10)->create();
        $response->assertInertia(fn (AssertableInertia $inertia) =>
        $inertia->component('Submissions/Index')
            ->has('submissions')
            ->count('submissions',10)
        );



    }
    public function test_form_submissions_can_be_deleted(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $submissions = FormSubmission::factory(10)->create();
        $response = $this->delete(route('submissions.destroy', ['id' => 1]))->assertOk()->count($submissions, 9);

    }
}
