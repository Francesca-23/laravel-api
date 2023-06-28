<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Post;

class ProjectController extends Controller
{
    public function index()
    {
        $posts = Post::with('type', 'technologies')->get();

        return response()->json(
        [
            'success'=>true,
            'posts'=>$posts,
        ]);
    }
}
