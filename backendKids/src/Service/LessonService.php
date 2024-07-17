<?php

namespace App\Service;

use App\Entity\Lesson;

class LessonService
{
    public function lessonToJson(Lesson $lesson)
    {
        return [
            'id' => $lesson->getId(),
            'title' => $lesson->getTitle(),
            'description' => $lesson->getDescription(),
            'lessonNumber' => $lesson->getLessonNumber(),
            'chapter' => $lesson->getChapter(),
            'category' => $lesson->getCategories(),
            'post' => $lesson->getPost(),
            'quiz' => $lesson->getQuiz(),
        ];
    }
}
