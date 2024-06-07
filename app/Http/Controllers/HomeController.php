<?php

namespace App\Http\Controllers;

use App\Models\Artifact;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Collections;
use App\Models\Faculty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        $faculty = Faculty::orderBy('created_at', 'desc')->get();
        $collections_count = Collections::all()->count();
        $artifact_count = Artifact::all()->count();
        return view('home', [
            'news' => $news,
            'faculty' => $faculty,
            'collections_count' => $collections_count,
            'artifact_count' => $artifact_count
        ]);
    }

    public function news($id) {
        $new_id = News::find($id);
        $images = $new_id->images; // Отримання зображень для цієї новини
        $news = News::orderBy('created_at', 'desc')->get();
        return view('news', compact('news', 'new_id', 'images'));
    }

    public function artifact($id) {
        $artifact = Artifact::find($id);
        $related_artifacts = Artifact::where('collections_id', $artifact->collections_id)->get();
        return view('artifact', compact('artifact', 'related_artifacts'));
    }

    public function faculty($id) {
        $faculty = Faculty::find($id);
        return view('faculty', [
            'faculty' => $faculty,
           
        ]);
    }
    
}

