<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index(Request $request)
    {
            $posts = Post::query()->paginate(5);
            return view(    'admin.post.index', compact('posts'));
    }
    public function create()
    {     
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }
    public function store(Request $request)
    {   
        
        $values = $request->all();
        $title = $values['title'];
        $category = $values['category_id'];
        $tags = $values['tags'];
        $autor = $values['author_id'];
        $status = $values['status_id'];
        $assunto = $values['subject'];
        $conteudo = $values['content'];

        $post = Post::create([
            'title' => $title,
            'subject' => $assunto,
            'category_id' => $category,
            'author_id' => $autor,
            'status_id' => $status,
            'content' => $conteudo
        ]);

        $tags = $post->tags()->sync([9, 10]);

        return redirect()->route('admin.posts.index')->with(' success', 'Post registrado com sucesso!');
       
    }
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('posts'));
    }
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
      
    }
    public function destroy(Post $post)
    {
       return redirect()
            ->route('post.index')
            ->with('success', 'Categoria excluída com sucesso!'); 
    }
}