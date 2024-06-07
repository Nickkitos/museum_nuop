<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collections;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collections::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.collections.index', [
            'collections' => $collections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.collections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
    
        $collections = new Collections();
        $collections->name = $validatedData['name'];
        $collections->save();
    
        return redirect()->back()->with('success', "Колекція була успішно додана!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
        $collections = Collections::findOrFail($id);

        return view('admin.collections.edit', [
            'collections' => $collections
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $collections = Collections::findOrFail($id); // Знаходимо групу за заданим ідентифікатором

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $collections->name = $validatedData['name'];
        $collections->save();

        return redirect()->back()->with('success', "Колекція була успішно оновлена!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $collections = Collections::findOrFail($id);

        if ($collections->artifacts()->exists()) {
            return redirect()->back()->with('error', 'Ця колекція має пов\'язані артефакти. Видаліть спочатку артефакти або перенесіть їх.');
        }

        $collections->delete();

        return redirect()->back()->with('success', 'Колекція була успішно видалена');
    }
}
