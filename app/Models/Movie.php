<?php

namespace App\Models;

use App\Traits\UuidTrait;
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
        'link_film',
        'poster',
        'link_trailer'
    ];
}
