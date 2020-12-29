<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];
    public function permissionsChild()
    {
        return $this->hasMany(Permission::class,'parent_id');
    }
}
