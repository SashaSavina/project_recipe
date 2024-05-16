<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable=[ 'name', 'ingredients', 'cooking_steps',];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }
}
