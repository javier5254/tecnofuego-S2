<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Component extends Model
{
    use HasFactory;
    protected $fillable = [
        'state',
        'client_id',
        'project_id',
        'item_id',
    ];
    protected $table='components';
}
