<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // champ du model dans la variable $fillable: autorise le remplisage automatique
    protected $fillable = [
        'name',
        'price',
        'stock',
    ];
}
