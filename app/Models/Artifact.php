<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artifact extends Model
{
    protected $table = 'artifact';

    public function group()
    {
        return $this->belongsTo(Groups::class, 'group_id');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }

    public function collection()
    {
        return $this->belongsTo(Collections::class, 'collections_id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
