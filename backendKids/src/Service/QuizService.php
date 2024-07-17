<?php

namespace App\Service;

use App\Entity\Quiz;

class QuizService
{
    public function quizToJson(Quiz $quiz)
    {
        $responses = $quiz->getResponses()->toArray();

        return [
            'id' => $quiz->getId(),
            'lesson' => $quiz->getLesson(),
            'responses' => $responses,
        ];
    }
}
