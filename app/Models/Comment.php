<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function recipes()
    {
        return $this->belongsTo(Recipe::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
