<?php

namespace Tests\Controllers\Categories;

use App\Http\Controllers\CategoriesController;
use App\Models\Category;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class EditTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    public function test_opens_categories_edit_returns_200(){
       $category = Category::find(1);
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/categories/edit/' . $category->id);
        $response->assertStatus(200);
    }

    public function test_can_update_name_of_category(){
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create(['name' => 'backend']);


        $response = $this->patch('/categories/' . $category->id, [
           '_token' => csrf_token(),
           'name' => 'fullstack'
        ]);

        $response->assertStatus(200);
        $this->assertEquals('fullstack', $category->name);

    }
}
