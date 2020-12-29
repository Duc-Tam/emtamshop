<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name','parent_id','slug','status','icon'];

    public function catChildren(){
        return $this->hasMany(Category::class, 'parent_id');
    }
}
