<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'price'
    ];
}
