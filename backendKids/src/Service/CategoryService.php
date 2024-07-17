<?php

namespace App\Service;

use App\Entity\Category;

class CategoryService
{
    public function categoryToJson(Category $category)
    {
        return [
            'type' => $category->getType(),
        ];
    }
}
