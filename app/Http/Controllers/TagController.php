<?php

namespace App\Http\Controllers;

use App\Models\{Post, Tag};
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
    	$posts = $tag->posts()->latest()->paginate(8);
    	return view('post/index', [
    		'posts' => $posts,
    		'tag' => $tag
    	]);
    }
}
