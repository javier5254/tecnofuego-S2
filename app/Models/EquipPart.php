<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipPart extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'equip_id',
        'state'
    ];
    protected $table = "equip_has_parts";
}
