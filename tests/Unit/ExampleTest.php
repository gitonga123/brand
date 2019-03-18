<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * Test if user got the right answer
     *
     * @return void
     */
    public function testUserGotCorrectAnswer()
    {
        $question_answer[] = ['question' => 17, 'answer' => 47];
        $question_answer[] = ['question' => 18, 'answer' => 48];
        $question_answer[] = ['question' => 19, 'answer' => 49];
        $question_answer[] = ['question' => 20, 'answer' => 50];
        $question_answer[] = ['question' => 21, 'answer' => 51];
        $question_answer[] = ['question' => 22, 'answer' => 52];
        $question_answer[] = ['question' => 23, 'answer' => 56];
        for ($i = 0; $i < count($question_answer); $i++) {
            $this->post(
                route('result.submit'),
                [
                    'question' => $question_answer[$i]['question'],
                    'answer' => $question_answer[$i]['answer']
                ]
            )->assertJson(['success' => true, 'answer' => true]);
        }
    }

    /**
     * Test if User gets the Results
     * 
     * @return void
     */
    public function testUserGetsResults()
    {
        $this->withoutExceptionHandling();
        $this->post(
            route('result.get'),
            [
                'user_id' => 1,
                'code' => 91
            ]
        )->assertSuccessful();
    }
}
