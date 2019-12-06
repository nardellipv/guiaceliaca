<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name', 'email', 'messageText', 'commerce_id'
    ];

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }
}
