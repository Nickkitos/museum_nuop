<?php

namespace App\Filters;

class ArtifactFilter extends QueryFilter{

    public function id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('id', $id);
        });
    }

    public function title($search_string = ''){
        return $this->builder->where('title', 'LIKE', '%'.$search_string.'%');
    }

    public function date($search_date = ''){
        if ($search_date) {
            return $this->builder->whereDate('date_arrival', '=', $search_date);
        }
       
        return $this->builder;
    }

    public function group_id($group_id = null){
        return $this->builder->when($group_id, function($query) use($group_id){
            $query->where('group_id', $group_id);
        });
    }

    public function department_id($department_id = null){
        return $this->builder->when($department_id, function($query) use($department_id){
            $query->where('department_id', $department_id);
        });
    }

    public function collections_id($collections_id = null){
        return $this->builder->when($collections_id, function($query) use($collections_id){
            $query->where('collections_id', $collections_id);
        });
    }

    public function publish($publish = ''){
        if ($publish == '3') {
            return $this->builder;
        }
        if ($publish !== 'null') {
            return $this->builder->where('publish', $publish);
        } else if ($publish !== '') {  
            return $this->builder;
        }
    }
    
    
}