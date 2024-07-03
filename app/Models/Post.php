<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;
use App\Models\Category;

use App\Enums\StatusEnum;
class Post extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'title',
        'description',
        'status',
        'category_id',
        'user_id',
        'image'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected $casts = [
        'status' => StatusEnum::class,
    ];
}
