<?php

namespace App\Repositories;

use App\Models\Category;

interface  ICategoryRepository
{
    public function getAllCategories();
    public function createCategory(array $data);
    public function getCategoryById($categoryId);
}
