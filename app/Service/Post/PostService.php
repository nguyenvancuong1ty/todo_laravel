<?php
namespace App\Service\Post;
use App\Service\Post\IPostService;
use App\Models\Post;
use App\Enums\StatusEnum;

class PostService implements IPostService {
    public function Create($request) {
        $validated = $request->validated();
        $post = Post::create([
            'title' => $validated["title"],
            'description' => $validated["description"],
            'user_id' => $validated["user_id"],
            'category_id' => $validated["category_id"],
            'status' => StatusEnum::from(strtolower($validated["status"]))->value,
            'image' => 'empty'
        ]);
        $post->save();
    }

    public function GetAll() {
        $posts = Post::all();
        return $posts;
    }
    public function GetPaging($status) {
        $posts = Post::with('user', 'category')
            ->where('status', $status)
            ->paginate(2);    
        return $posts;
    }
}

