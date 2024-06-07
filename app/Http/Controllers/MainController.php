<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Artifact;
use App\Models\Collections;
use App\Models\Faculty;

class MainController extends Controller
{
    public function welcome() {
        return view('welcome');
    }


    public function collections() {
        $collections = Collections::all();
        $faculty = Faculty::all();
        $artifacts = Artifact::where('publish', 1)->get();
        return view('collections', [
            'collections' => $collections,
            'artifacts' => $artifacts,
            'faculty' => $faculty,
        ]);
    }

    public function map() {
        return view('map');
    }

    public function about() {
        $about = About::all();
        $faculty = Faculty::orderBy('created_at', 'desc')->get();
        return view('about', [
            'about' => $about,
            'faculty' => $faculty
        ]);
    }


}
