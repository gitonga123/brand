<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionsCollection extends ResourceCollection
{
    /**
     * The additional data that should be added to the
     * top-level resource array.
     *
     * @var array
     */
    public $with = ['success' > true];

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'questions' => $this->collection->transform(
                function ($question) {
                    return [
                        'id' => (string) $question->id,
                        'question' => $question->title,
                        'answers' => $question->answers,
                        'answer' => $question->answer,
                        'level' => $question->level->level,
                    ];
                }
            )
        ];
    }

    /**
     * Get any additional data that should
     * be returned with the resource array
     *
     * @param \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function with($request)
    {
        return $this->with;
    }
}
