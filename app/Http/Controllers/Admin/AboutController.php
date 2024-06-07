<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::orderBy('created_at', 'desc')->get();

        return view('admin.about.index', [
            'about' => $about
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description_1' => ['required', 'string'], 
            'img_1' => ['required'],
            'description_2' => ['required', 'string'], 
            'img_2' => ['required'],
            'video' => ['required'],
            'text' => ['required'],
        ]);
        
        $about = new About();
        $about->description_1 = $validatedData['description_1'];
        $about->img_1 = $validatedData['img_1'];
        $about->description_2 = $validatedData['description_2'];
        $about->img_2 = $validatedData['img_2'];
        $about->video = $validatedData['video'];
        $about->text = $validatedData['text'];
        $about->save();

        return redirect()->back()->with('success', "Новина була успішно опублікована!");
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

        $about = About::findOrFail($id);
        
        return view('admin.about.edit', [
            'about' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'description_1' => ['required', 'string'], 
            'img_1' => ['required'],
            'description_2' => ['required', 'string'], 
            'img_2' => ['required'],
            'video' => ['required', ],
            'text' => ['required'],
        ]);

        
        $about = About::findOrFail($id);
        $about->description_1 = $validatedData['description_1'];
        $about->img_1 = $validatedData['img_1'];
        $about->description_2 = $validatedData['description_2'];
        $about->img_2 = $validatedData['img_2'];

        $url = $request->input('video'); // Отримуємо URL з запиту

        // Отримуємо розширення файлу з URL
        $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);

        // Перевіряємо розширення файлу
        if (!in_array($extension, ['mp4', 'mpeg', 'avi', 'quicktime'])) {
            // Якщо розширення не відповідає вказаним, генеруємо помилку
            return back()->withErrors(['video' => 'Файл повинен мати розширення mp4, mpeg, avi або quicktime']);
        } else {
            $about->video = $validatedData['video'];
        }


        $about->text = $validatedData['text'];
        $about->save();

        return redirect()->back()->with('success', "Сторінка 'Про нас' була успішно оновлена!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
