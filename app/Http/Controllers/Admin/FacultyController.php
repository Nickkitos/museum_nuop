<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       $faculty = Faculty::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.faculty.index', [
            'faculty' => $faculty,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'], 
            'description' => ['required']
        ]);

        $faculty = new Faculty();
        $faculty->name = $validatedData['name'];
        $faculty->description = $validatedData['description'];

        $faculty->save();

        return redirect()->back()->with('success', "Факультет був успішно доданий!"); 
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
        $faculty = Faculty::findOrFail($id);

        return view('admin.faculty.edit', [
            'faculty' => $faculty
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'], 
            'description' => ['nullable'],
        ]);

        $faculty->name = $validatedData['name'];
        $faculty->description = $validatedData['description'];
        $faculty->save();
    
        return redirect()->back()->with('success', "Факультет був успішно оновлений!"); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect()->back()->with('success', 'Факультет був успішно видалений');
    }
}
