<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'movie';

    protected $fillable = [
        'id',
        'title',
        'description',
        'id_category',
        'link_film',
        'banner',
        'poster',
        'link_trailer'
    ];
}
