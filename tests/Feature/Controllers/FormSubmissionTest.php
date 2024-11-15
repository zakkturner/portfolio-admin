<?php

namespace Tests\Controllers\FormSubmission;

use Inertia\Testing\AssertableInertia;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{


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

        $response->assertInertia(fn (AssertableInertia $inertia) =>
        $inertia->component('Submissions/Index')
            ->has('submissions')
        );


    }
}
