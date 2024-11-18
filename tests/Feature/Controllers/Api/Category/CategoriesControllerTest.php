<?php

namespace Tests\Controllers\Api;

use App\Http\Controllers\CategoriesController;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
        public function test_invoke_sends_categories(){

            $response = $this->get('/api/v1/categories');


            $response->assertStatus(200);

            $response->assertJsonCount(3);


            $response->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                ],
            ]);
        }
}
