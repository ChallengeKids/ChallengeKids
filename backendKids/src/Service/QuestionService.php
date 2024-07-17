<?php

namespace App\Service;

use App\Entity\Question;

class QuestionService
{
    public function questionToJson(Question $question)
    {
        $options = $question->getOptions()->toArray();

        return [
            'id' => $question->getId(),
            'questionNumber' => $question->getQuestionNumber(),
            'type' => $question->getType(),
            'options' => $options,
        ];
    }
}
