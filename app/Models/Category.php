<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Enums\StatusEnum;
use App\Models\Post;
class Category extends Model
{
    use HasFactory;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
        
    }

    protected $fillable = [
        'name',
        'status'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];
}
