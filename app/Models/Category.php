<?php

namespace App\Models;

use App\Traits\Followable;
use App\Traits\Hideable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Followable, Hideable;

    public function posts()
    {
        return $this->hasMany(Post::class);
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
