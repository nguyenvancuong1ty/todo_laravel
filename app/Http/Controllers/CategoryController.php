<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Service\Category\ICategoryService;
use App\Http\Requests\category\CreateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $categoryService;

    public function __construct(ICategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->GetPaging(3);
        return view('category.Index', ['categories'=> $categories]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $this->categoryService->Create($request);
        return redirect()->route('category.Index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $count = $this->categoryService->Delete($id);
        if ($count) {
            return redirect()->route('category.Index')->with('success', 'Category deleted successfully');
        } else {
            return redirect()->route('category.Index')->with('error', 'Category not found or deletion failed');
        }
    }
}
