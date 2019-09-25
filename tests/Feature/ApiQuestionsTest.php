<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiQuestionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    /**
     * Test get Questions
     *
     * @return void
     */
    public function testGetQuestionsEndpoint()
    {
        $this->withoutExceptionHandling();
        $this->get('/api/v1/my-questions')->assertSuccessful()
        ->assertStatus(200)
        ->assertJsonStructure(['success', 'questions']);
    }
}
