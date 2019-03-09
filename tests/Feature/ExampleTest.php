<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Question;
use App\Answer;

class ExampleTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * Test if Question Can Be Created.
     *
     * @return void
     */
    public function testCanCreateQuestion()
    {
        $this->withoutExceptionHandling();

        $this->post(
            route('question.store'),
            [
                "title" => "What's Your Name?",
                "published" => 2,
                "points" => 0.05
            ]
        )->assertSessionHas('success', 'Question Created Successfully')
            ->assertRedirect(route('question.index'));

        $this->assertDatabaseHas(
            'questions',
            [
                'title' => "What's Your Name?",
                "published" => 2,
                "points" => 0.05
            ]
        );
    }

    /**
     * Test if an answer can be created
     */
    public function testCanCreateAnswer()
    {
        $this->withoutExceptionHandling();

        $this->post(
            route("answer.create"),
            [
                'title' => "James Doe",
                "correct" => 1,
            ]
        )->assertRedirect(route('answer.index'));

        $this->assertDatabaseHas(
            'answers',
            [
                'title' => "James Doe",
                "correct" => 1,
            ]
        );
    }

    /**
     * Test if a question can be attached to a single answer
     *
     * @return void
     */
    public function testMatchQuestionToAnswers()
    {
        $this->withoutExceptionHandling();
        $question = factory(Question::class)->create();
        $answer = factory(Answer::class, 10)->create();

        $question->answers()->sync($answer);

        for ($i = 0; $i < $answer->count(); $i++) {
            $this->assertDatabaseHas(
                'answer_question',
                [
                    'question_id' => $question->id,
                    'answer_id' => $answer[$i]->id
                ]
            );
        }
    }
}
