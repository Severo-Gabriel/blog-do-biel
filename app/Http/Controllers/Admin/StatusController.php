<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Status;         
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::paginate(10);
        return view('admin.status.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.status.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required|min:3',
            'description'=>'nullable'
       
        ]);

        Status::create($validate);

        return redirect()->route('admin.status.index')->with('success', 'Status criado com sucesso!');
    }

    public function edit(Status $status)
    {
        return view('admin.status.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable'
        ]);

        $status->update($request->all());

        return redirect()->route('admin.status.index')->with('success', 'Status atualizado com sucesso!');
    }

    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('admin.status.index')->with('success', 'Status removido!');
    }
    public function show(Status $status)
    {
        return view('admin.status.show', compact('status'));
    }
    
}
