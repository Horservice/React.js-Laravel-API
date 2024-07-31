<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contry',
        'cartId',
        'dateDel',
        'dateExp',
        'img',
        'fileName'
    ];
}
