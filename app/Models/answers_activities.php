<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answers_activities extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'creator_id',
        'list_id',
        'activ_id',
        'state',
        'observ',
    ];
    protected $table='answers_activities';
}
