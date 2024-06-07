<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class NewsImg extends Model
{
    use HasFactory;

    public function news()
{
    return $this->belongsTo(News::class);
}
}
