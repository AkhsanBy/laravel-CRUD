<?php

namespace App\Http\Controllers;

use App\Models\{Post, Category};
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
    	$posts = $category->posts()->latest()->paginate(8);
    	return view('post/index', [
    		'posts' => $posts, 
    		'category' => $category
    	]);
    }
}
