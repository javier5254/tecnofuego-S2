<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;
    protected $fillable = [
        "description",
        "creator_id",
        "list_id",
    ];
    protected $table = "observations";
}
