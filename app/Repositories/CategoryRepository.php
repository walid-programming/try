<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{
    public function getAllCategories(){
        return Category::get(['id','name','parent']);
    }
    public function createCategory(array $data){
        return Category::create($data);
    }
    public function getCategoryById($categoryId){
        return Category::findOrFail($categoryId);
    }
}
