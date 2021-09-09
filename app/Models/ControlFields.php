<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlFields extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'item_id',
        'valist_id'
    ];
    protected $table = "control_fills";
}
