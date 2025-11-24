<?php


namespace App\Http\Controllers\Admin;
    
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        // Valor padrão para active se não for enviado
        $validated['active'] = $request->has('active') ? true : false;

        Tag::create($validated);

        return redirect()->route('admin.tags.index')
                        ->with('success', 'Tag criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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
