<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    protected $table = 'collections';

    public function artifacts()
    {
        return $this->hasMany(Artifact::class, 'collections_id');
    }
}
