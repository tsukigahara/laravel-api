<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'year',
        'cashOut',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Movie::class);
    }
}
