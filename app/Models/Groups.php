<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'groups';

    public function artifacts()
    {
        return $this->hasMany(Artifact::class, 'group_id');
    }
}
