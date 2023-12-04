<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeRedData extends Model
{
    use HasFactory;

    protected $table = 'node_red_data';

    protected $fillable = [
        'temperatura',
        'voltaje',
        'intensidad_luz',
        'distancia',
    ];
}
