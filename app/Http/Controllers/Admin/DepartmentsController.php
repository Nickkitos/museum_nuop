<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departments;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Departments::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.departments.index', [
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
    
        $departments = new Departments();
        $departments->name = $validatedData['name'];
        $departments->save();
    
        return redirect()->back()->with('success', "Відділ був успішно доданий!");
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
        $departments = Departments::findOrFail($id);

        return view('admin.departments.edit', [
            'departments' => $departments
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departments = Departments::findOrFail($id); // Знаходимо групу за заданим ідентифікатором

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $departments->name = $validatedData['name'];
        $departments->save();

        return redirect()->back()->with('success', "Відділ був успішно оновлений!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departments = Departments::findOrFail($id);

        if ($departments->artifacts()->exists()) {
            return redirect()->back()->with('error', 'Цей відділ має пов\'язані артефакти. Видаліть спочатку артефакти або перенесіть їх.');
        }

        $departments->delete();

        return redirect()->back()->with('success', 'Відділ був успішно видалений');
 
    }
}
