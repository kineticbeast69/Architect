<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blog extends Model
{
    protected $fillable = ["title", "slug", "description", "status", "image", "author_id"];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
