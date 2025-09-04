<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model
{
    protected $fillable = ["title", "slug", "description", "status", "image", "author_id", "blog_id", "updated_blog", "published_at"];

    public function users()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
