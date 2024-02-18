<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    public function hides()
    {
        return $this->morphMany(Hide::class, 'hideable');
    }

    public function follows()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

}
