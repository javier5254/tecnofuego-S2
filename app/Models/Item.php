<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'partNum',
        'costU',
        'quantity',
        'description',
        'family_id',
        'category_id',
        'type'
    ];
    protected $table = "items";
}
