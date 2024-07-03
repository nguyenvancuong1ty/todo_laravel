<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Requests\post\CreateRequest;
use App\Service\Post\IPostService;
use App\Service\User\IUserService;
use App\Service\Category\ICategoryService;
use App\Enums\StatusEnum;
class PostController extends Controller
{

    protected $postService;
    protected $userService;
    protected $categoryService;

    public function __construct(IPostService $postService, IUserService $userService, ICategoryService $categoryService) 
    {
        $this->postService = $postService;
        $this->userService = $userService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $status)
    {
        $limit = $request->query('limit');
        $data = $this->postService->GetPaging( $status);
        return view('post.index', ['posts' => $data]);
        // return $data->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = $this->userService->GetAll();
        $categories = $this->categoryService->GetAll();
        return view('post.create', ['users'=> $users, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $this->postService->Create($request);
        return redirect()->route('post.Index', 'active')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
