<?php

namespace App\Service;

use App\Entity\Category;

class CategoryService
{
    public function categoryToJson(Category $category)
    {
        return [
            'title' => $category->getTitle(),
            'description' => $category->getDescription()
        ];
    }
}
