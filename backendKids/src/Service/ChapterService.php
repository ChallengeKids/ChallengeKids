<?php

namespace App\Service;

use App\Entity\Chapter;

class ChapterService
{
    public function chapterToJson(Chapter $chapter)
    {
        return [
            'id' => $chapter->getId(),
            'title' => $chapter->getTitle(),
            'description' => $chapter->getDescription(),
            'chapterNumber' => $chapter->getChapterNumber(),
            'challenge' => $chapter->getChallenge(),
            'category' => $chapter->getCategories(),
        ];
    }
}
