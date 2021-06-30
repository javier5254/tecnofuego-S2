<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "internalN",
        "horometer",
        "state",
        "client_id",
        "project_id",
        "flota_id",
        "marca_id",
        "modelo_id",
        "sistema_id",
        "periodicidad_id",

    ];
    protected $table = "equipments";
}
