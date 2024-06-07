<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $table = 'departments';

    public function artifacts()
    {
        return $this->hasMany(Artifact::class, 'department_id');
    }
}
