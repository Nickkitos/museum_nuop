<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\NewsImg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.news.index', [
            'news' => $news
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:150'], 
            'description' => ['required', 'string', 'max:300'],
            'text' => ['required'],
            'img.*' => ['required'],
        ]);
        


        $news = new News();
        $news->title = $validatedData['title'];
        $news->description = $validatedData['description'];
        $news->text = $validatedData['text'];
        $news->save();

        // Перевірка, чи передані шляхи до зображень
        if ($request->has('img')) {
            // Отримання масиву шляхів до зображень
            $imagePaths = $request->img;

            // Зберігання кожного шляху до зображення в табличці news_imgs
            foreach ($imagePaths as $path) {
                // Створення нового запису в табличці news_imgs
                $newsImage = new NewsImg();
                $newsImage->news_id = $news->id;
                $newsImage->url = $path;
                $newsImage->save();
            }
        }

        return redirect()->back()->with('success', "Новина була успішно опублікована!");
    }



    

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $newsImages = NewsImg::where('news_id', $news->id)->get();
        
        return view('admin.news.edit', [
            'news' => $news,
            'newsImages' => $newsImages
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
{

    $validatedData = $request->validate([
        'title' => ['required', 'string', 'max:150'], 
        'description' => ['required', 'string', 'max:300'],
        'text' => ['required'],
        'img.*' => ['required'],
    ]);
    
    $news->title = $validatedData['title'];
    $news->description = $validatedData['description'];
    $news->text = $validatedData['text'];
    $news->save();

    // Оновлення шляхів до зображень
    if ($request->has('img')) {
        $imagePaths = $request->img;

        // Видалення старих зображень
        $news->images()->delete();

        // Додавання нових зображень
        foreach ($imagePaths as $path) {
            $newsImage = new NewsImg();
            $newsImage->news_id = $news->id;
            $newsImage->url = $path;
            $newsImage->save();
        }
    }

    return redirect()->back()->with('success', "Новина була успішно оновлена!");
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->back()->with('success', 'Новина була успішно видалена');
    }
}
