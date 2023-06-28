<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
