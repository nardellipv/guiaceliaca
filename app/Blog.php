<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'body','photo','status','view','like','slug','user_id'
    ];
}
