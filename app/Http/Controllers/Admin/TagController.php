<?php


namespace App\Http\Controllers\Admin;
    
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));

    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:tags',
            'color' => 'nullable|string|max:7',
            'description' => 'nullable|string|max:500',
            'active' => 'boolean',
        ], [
            'name.required' => 'O nome da tag é obrigatório',
            'name.unique' => 'Esta tag já existe',
            'name.max' => 'O nome deve ter no máximo 255 caracteres',
            'color.max' => 'O código da cor deve ter no máximo 7 caracteres',
            'description.max' => 'A descrição deve ter no máximo 500 caracteres',
        ]);

        $validated['active'] = $request->has('active') ? true : false;

        Tag::create($validated);

        return redirect()->route('admin.tags.index')
                        ->with('success', 'Tag criada com sucesso!');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
            'color' => 'nullable|string|max:7',
            'description' => 'nullable|string|max:500',
            'active' => 'boolean',
        ], [
            'name.required' => 'O nome da tag é obrigatório',
            'name.unique' => 'Esta tag já existe',
            'name.max' => 'O nome deve ter no máximo 255 caracteres',
            'color.max' => 'O código da cor deve ter no máximo 7 caracteres',
            'description.max' => 'A descrição deve ter no máximo 500 caracteres',
        ]);

        $validated['active'] = $request->has('active') ? true : false;

        $tag->update($validated);

        return redirect()->route('admin.tags.index')
                        ->with('success', 'Tag atualizada com sucesso!');
    }

    public function destroy(Tag $tag)
    {

        $tag->delete();

        return redirect()->route('admin.tags.index')
                        ->with('success', 'Tag excluída com sucesso!');
    }
    public function show($id)

    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.show', compact('tag'));
    }
}