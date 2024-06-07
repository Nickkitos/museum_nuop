<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groups;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Groups::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.groups.index', [
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
    
        $groups = new Groups();
        $groups->name = $validatedData['name'];
        $groups->save();
    
        return redirect()->back()->with('success', "Група була успішно додана!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groups = Groups::findOrFail($id);

        return view('admin.groups.edit', [
            'groups' => $groups
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $groups = Groups::findOrFail($id); // Знаходимо групу за заданим ідентифікатором

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $groups->name = $validatedData['name'];
        $groups->save();

        return redirect()->back()->with('success', "Група була успішно оновлена!");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $groups = Groups::findOrFail($id);

        if ($groups->artifacts()->exists()) {
            return redirect()->back()->with('error', 'Ця група має пов\'язані артефакти. Видаліть спочатку артефакти або перенесіть їх.');
        }

        $groups->delete();

        return redirect()->back()->with('success', 'Група була успішно видалена');
    }
}
