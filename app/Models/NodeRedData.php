<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeRedData extends Model
{
    use HasFactory;

    protected $table = 'sensor_data';
    protected $primaryKey = 'SensorID';

    protected $fillable = [
        'temperature',
        'voltage',
        'luminosity',
        'proximity',
    ];
}
