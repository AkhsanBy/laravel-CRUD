<?php

namespace App\Http\Controllers;

use App\Models\{Category, Post, Tag};
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post/index', [
        	'posts' => Post::latest()->paginate(8)
    	]);
    }

    public function show(Post $post)
    {
        // menampilkan halaman show bersamaan dengan data pada tabel post
    	return view('post/show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('post/create', [
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function save(PostRequest $request)
    {
        $thumbnailUrl = request()->file('thumbnail')->store('images/post');

        // mengambil data dalam semua form
        $data = request()->all();
        $data['slug'] = \Str::slug(request()->title);
        $data['category_id'] = request()->category;
        $data['thumbnail'] = $thumbnailUrl;

        // menyimpan ke database
        $post = Post::create($data);
        $post->tags()->attach(request()->tags);

        // kembali ke halaman post sambil membawa session
        return redirect('/post')->with('created', 'New post has been created!');
    }

    public function edit(Post $post)
    {
        // menampilkan halaman edit bersamaan dengan data pada tabel post
        return view('post/edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }   

    public function update(PostRequest $request, Post $post)
    {
        if (request()->file('thumbnail')) {
            \Storage::delete()->$post['thumbnail'];
            $thumbnailUrl = request()->file('thumbnail')->store('images/post');
        } else {
            $thumbnailUrl = $post['thumbnail'];
        }


        // mengambil semua data dalam form
        $data = request()->all();
        $data['thumbnail'] = $thumbnailUrl;

        // mengupdate data pada database 
        $post->update($data);
        $post->tags()->sync(request()->tags);

        // kembali ke halaman post sambil membawa session
        return redirect('/post')->with('updated', 'The post has been updated!');
    }

    public function delete(Post $post)
    {
        \Storage::delete($post['thumbnail']);
        $post->tags()->detach();
        $post->delete();

        // kembali ke halaman post sambil membawa session
        return redirect('/post')->with('deleted', 'The post has been deleted!');
    }
}
