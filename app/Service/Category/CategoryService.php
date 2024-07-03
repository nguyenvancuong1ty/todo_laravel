<?php
namespace App\Service\Category;
use App\Service\Category\ICategoryService;
use App\Models\Category;
use App\Enums\StatusEnum;
use Carbon\Carbon;

class CategoryService implements ICategoryService {
    public function Create($request) {
        $validated = $request->validated();
        $newCategory = Category::create([
            'name' => $validated["name"],
            'status' => StatusEnum::from(strtolower($validated["status"]))->value,
        ]);
        $newCategory->save();
    }

    public function GetAll() {
        $categories = Category::all();
        return $categories;
    }
    public function GetPaging($limit) {
        $categories = Category::paginate((int)$limit);
        return $categories;
    }

    public function Delete($id) {
        $count = Category::destroy($id);
        return $count;
    }
}

