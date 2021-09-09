<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivList extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "state",
        "type_id",
    ];
    protected $table = "activ_lists";
}
