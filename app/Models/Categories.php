<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
