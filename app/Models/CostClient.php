<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'cost',
        'item_id',
        'client_id'
    ];
    protected $table = "client_costs";
}
