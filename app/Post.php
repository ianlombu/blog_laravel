<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    Protected $table = 'post';
    Protected $fillable = ['judul','category_id','konten','gambar','slug','users_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
