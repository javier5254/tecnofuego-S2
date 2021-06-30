<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valist extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'state',
        'father_id',
        'list_id'
    ];
    protected $table = "valists";
}
