<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name', 'text', 'percentage', 'end_date', 'picture_id', 'commerce_id'
    ];

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }
}
