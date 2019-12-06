<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name', 'email', 'message', 'votes_positive','votes_negative','status', 'commerce_id'
    ];

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }
}
