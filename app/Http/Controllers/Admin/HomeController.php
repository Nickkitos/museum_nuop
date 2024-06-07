<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artifact;
use App\Models\Collections;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {

        $news_count = News::all()->count();
        $users_count = User::all()->count();
        $colections_count = Collections::all()->count();
        $artifact_count = Artifact::all()->count();

        return view('admin.home.index' , [
            'news_count' => $news_count,
            'users_count' => $users_count,
            'colections_count' => $colections_count,
            'artifact_count' => $artifact_count
        ]);
    }
}
