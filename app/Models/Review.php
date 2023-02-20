<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'review';

    protected $fillable = [
        'id',
        'id_movie',
        'id_user',
        'preview',
        'rating'
    ];
}
