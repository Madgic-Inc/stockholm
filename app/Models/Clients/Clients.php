<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
        'name',
        'phone'
    ];

}
