<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->paginate(10);
        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|email|max:255',

        ]);

        Author::create($validated);

        return redirect()->route('admin.authors.index')
            ->with('success', 'Autor criado com sucesso!');
    }

    public function show(Author $author)
    {
        return view('admin.authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $author->update($validated);

        return redirect()->route('admin.authors.index')
            ->with('success', 'Autor atualizado com sucesso!');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('admin.authors.index')
            ->with('success', 'Autor excluído com sucesso!');
    }
}
