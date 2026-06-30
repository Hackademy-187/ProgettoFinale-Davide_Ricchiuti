<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillade = ['name'];

    public function articles()
{
    return $this->belongsToMany(Article::class);
}
}


