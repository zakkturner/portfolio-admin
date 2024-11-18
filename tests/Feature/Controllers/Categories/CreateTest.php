<?php

namespace Controllers\Categories;

use App\Http\Controllers\CategoriesController;
use App\Models\Category;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class CreateTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    public function test_categories_create_returns_200(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/categories/create');
        $response->assertStatus(200);
    }
    public function test_user_can_create_categories(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/categories', [
            "name" => 'frontend'
        ]);
        $response->assertStatus(200);
    }

}
