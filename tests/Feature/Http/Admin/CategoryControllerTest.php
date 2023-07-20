<?php

namespace Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_CategoryList_Success(): void
    {
        $response = $this->get(route('admin.categories'));

        $response->assertStatus(200);
    }

    public function test_CategoryCreate_Success(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }

    public function test_StoreNewsCreate_Success(): void
    {
        $postData = [
            'name' => 'TestName',
        ];
        $response = $this->post(route('admin.categories.store'),$postData);

        $response->assertStatus(200);
        $response->assertJson($postData);
    }
}
