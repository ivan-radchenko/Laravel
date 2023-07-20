<?php

namespace Http;

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
        $response = $this->get(route('news.index'));

        $response->assertStatus(200);
    }

    public function test_NewsShow_Success(): void
    {
        $response = $this->get(route('news.show',['id'=>fake()->numberBetween(1,5)]));

        $response->assertStatus(200);
    }

    public function test_NewsCategories_Success(): void
    {
        $response = $this->get(route('news.categories'));

        $response->assertStatus(200);
    }

    public function test_showCategory_Success(): void
    {
        $response = $this->get(route('news.showCategory',['id'=>fake()->numberBetween(1,5)]));

        $response->assertStatus(200);
    }

    public function test_uploading_Success(): void
    {
        $response = $this->get(route('news.uploading'));

        $response->assertStatus(200);
    }

    public function test_StoreUploading_Success(): void
    {
        $postData = [
            'user' => 'TestUser',
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'description' => 'TestDescription_TestDescription_TestDescription'
        ];
        $response = $this->post(route('news.uploading.store'),$postData);

        $response->assertStatus(200);
        $response->assertJson($postData);
    }
}
