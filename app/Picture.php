<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
