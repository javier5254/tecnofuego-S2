<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipCompo extends Model
{
    use HasFactory;
    protected $fillable = [
        'equip_id',
        'component_id',
        'state'
    ];
    protected $table = "equip_has_compos";
}
