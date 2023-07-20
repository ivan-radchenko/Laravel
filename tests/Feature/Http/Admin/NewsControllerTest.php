<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_NewsList_Success(): void
    {
        $response = $this->get(route('admin.news'));

        $response->assertStatus(200);
    }

    public function test_NewsCreate_Success(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function test_StoreNewsCreate_Success(): void
    {
        $postData = [
            'title' => 'TestTitle',
            'author' => 'TestAuthor',
            'status' => 'draft',
            'description' => 'TestDescription_TestDescription_TestDescription'
        ];
        $response = $this->post(route('admin.news.store'),$postData);

        $response->assertStatus(200);
        $response->assertJson($postData);
    }

    public function test_StoreNewsCreate_Error(): void
    {
        $postData = [
            'author' => 'TestAuthor',
            'status' => 'draft',
            'description' => 'TestDescription_TestDescription_TestDescription'
        ];
        $response = $this->post(route('admin.news.store'),$postData);
        $response->assertStatus(302);
    }
}
