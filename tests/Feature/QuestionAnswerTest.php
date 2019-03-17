<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Question;
use App\Answer;
use App\Hint;
use App\QuestionAnswer;
use App\Level;

class QuestionAnswerTest extends TestCase
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
                'hint' => "American",
                'description' => "country of origin"
            ]
        )->assertSessionHas('success', 'Hint Created Successfully')
            ->assertRedirect(route('hints.index'));

        $this->assertDatabaseHas(
            'hints',
            [
                'hint' => "American",
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

    /**
     * Test if an answer can be updated
     *
     * @return void
     */
    public function testCanUpdateHints()
    {
        $this->withoutExceptionHandling();

        $hint = factory(Hint::class)->create();

        $this->put(
            route('hints.update', ['hint' => $hint->id]),
            [
                'hint' => "American",
                'description' => "country of origin"
            ]
        )->assertSessionHas('success', "Hint Updated Successfully")
            ->assertRedirect(route('hints.show', ['hint', $hint->id]));

        $this->assertDatabaseHas(
            'hints',
            [
                'id' => $hint->id,
                'hint' => "American",
                'description' => "country of origin"
            ]
        );
    }

    /**
     * Test if an Question and Answer can be created
     * 
     * @return void
     */
    public function testCanCreateQuestionAnswer()
    {
        $this->withoutExceptionHandling();
        $question = factory(Question::class)->create();
        $answer = factory(Answer::class)->create();

        $this->post(
            route('answer.store'),
            [
                'question_id' => $question->id,
                'answer_id' => $answer->id
            ]
        )->assertSessionHas('success', 'Question and Answer Stored Successfully')
            ->assertRedirect(route('questions.show', ['question' => $question->id]));
        $this->assertDatabaseHas(
            'question_answers',
            [
                'question_id' => $question->id,
                'answer_id' => $answer->id
            ]
        );
    }

    /**
     * Test update a question and an answer
     * 
     * @return void
     */
    public function testCanUpdateQuestionAnswer()
    {
        $this->withExceptionHandling();
        $questionAnswer = factory(QuestionAnswer::class)->create();
        $this->put(
            route(
                'answer.update',
                ['questionAnswer' => $questionAnswer->id]
            ),
            [
                'answer_id' => 4
            ]
        )->assertSessionHas(
            'success',
            'Question Plus the answer Updated Successfully'
        )->assertRedirect(
            route(
                'questions.show',
                [
                    'question' => $questionAnswer->id
                ]
            )
        );

        $this->assertDatabaseHas(
            'question_answers',
            [
                'question_id' => $questionAnswer->question_id,
                'answer_id' => 4
            ]
        );
    }

    /**
     * Test if Levels can be created
     * 
     * @return void
     */
    public function testCanCreateLevel()
    {
        $this->withoutExceptionHandling();

        $this->post(
            route('levels.store'),
            [
                'level' => 'Very Easy'
            ]
        )->assertSessionHas('success', 'Level Created Successfully')
            ->assertRedirect(route('levels.index'));
    }

    /**
     * Test if Levels Can be Updated
     * 
     * @return void
     */
    public function testCanUpdateLevel()
    {
        $this->withoutExceptionHandling();

        $level = factory(Level::class)->create();

        $this->put(
            route('levels.update', ['levels' => $level->id]),
            [
                'level' => 'Testing if Updated',
            ]
        )->assertSessionHas('success', 'Level Updated Successfully')
            ->assertRedirect(route('levels.show', ['levels', $level->id]));
        $this->assertDatabaseHas(
            'levels',
            [
                'id' => $level->id,
                'level' => 'Testing if Updated'
            ]
        );
    }

    /**
     * Test if Levels has Questions
     * 
     * @return void
     */
    public function testCanGetQuestions()
    {
        $this->withoutExceptionHandling();
        $level = factory(Level::class)->create();
        $this->assertEmpty($level->questions);
        $question = factory(Question::class)->create();
        $this->assertDatabaseHas(
            'questions',
            [
                'id' => $question->id,
                'level_id' => $question->level_id,
                'title' => $question->title
            ]
        );
        $this->assertDatabaseHas(
            'levels',
            [
                'level' => $question->level->level,
                'id' => $question->level->id
            ]
        );
    }
}
