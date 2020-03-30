<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    Protected $table = 'tag';
    Protected $fillable = ['nama','slug'];

    public function post()
    {
        return $this->belongsToMany('App\Post');
    }
}
