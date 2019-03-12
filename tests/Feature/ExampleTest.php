<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Question;
use App\Answer;
use App\Hint;

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
            route('questions.store'),
            [
                "title" => "What's Your Name?",
                "published" => 2,
                "points" => 0.05
            ]
        )->assertSessionHas('success', 'Question Created Successfully')
            ->assertRedirect(route('questions.index'));

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
     *
     * @return void
     */
    public function testCanCreateAnswer()
    {
        $this->withoutExceptionHandling();

        $this->post(
            route("answers.store"),
            [
                'title' => "James Doe",
                "correct" => 1,
            ]
        )->assertSessionHas('success', 'Answer Created Successfully')
            ->assertRedirect(route('answers.index'));

        $this->assertDatabaseHas(
            'answers',
            [
                'title' => "James Doe",
                "correct" => 1,
            ]
        );
    }

    /**
     * Test if an answer can be created
     *
     * @return void
     */
    public function testCanCreateHints()
    {
        $this->withoutExceptionHandling();

        $this->post(
            route("hints.store"),
            [
                'hint' => "Kenyan",
                'description' => "country of origin"
            ]
        )->assertSessionHas('success', 'Hint Created Successfully')
            ->assertRedirect(route('hints.index'));

        $this->assertDatabaseHas(
            'answers',
            [
                'hint' => "Kenyan",
                'description' => "country of origin"
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

    /**
     * Test if a question can be attached to a single/Mulitple hints
     *
     * @return void
     */
    public function testMatchQuestionToHints()
    {
        $this->withoutExceptionHandling();
        $question = factory(Question::class)->create();
        $hints = factory(Hint::class, 10)->create();

        $question->hints()->sync($hints);

        for ($i = 0; $i < $hints->count(); $i++) {
            $this->assertDatabaseHas(
                'hint_question',
                [
                    'question_id' => $question->id,
                    'hint_id' => $hints[$i]->id
                ]
            );
        }
    }

    /**
     * Test if a question can be updated
     *
     * @return void
     */
    public function testCanUpdateQuestion()
    {
        $this->withoutExceptionHandling();

        $question = factory(Question::class)->create();

        $this->put(
            route('questions.update', ['question' => $question->id]),
            [
                'title' => "When did Kenya Gain Independence?"
            ]
        )->assertSessionHas('success', "Question Updated Successfully")
            ->assertRedirect(route('questions.show', ['question', $question->id]));

        $this->assertDatabaseHas(
            'questions',
            [
                'title' => "When did Kenya Gain Independence?"
            ]
        );
    }

    /**
     * Test if an answer can be updated
     *
     * @return void
     */
    public function testCanUpdateAnswers()
    {
        $this->withoutExceptionHandling();

        $answer = factory(Answer::class)->create();

        $this->put(
            route('answers.update', ['answer' => $answer->id]),
            [
                'title' => "1983",
                'correct' => 1
            ]
        )->assertSessionHas('success', "Answer Updated Successfully")
            ->assertRedirect(route('answers.show', ['answers', $answer->id]));

        $this->assertDatabaseHas(
            'answers',
            [
                'id' => $answer->id,
                'title' => "1983",
                "correct" => 1
            ]
        );
    }
}
