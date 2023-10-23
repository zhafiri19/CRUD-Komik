<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komik extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'penulis', 'penerbit', 'content'
    ];
    // protected $guarded = ['id'];
}
