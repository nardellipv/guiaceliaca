<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }

    public function CommercePayment()
    {
        return $this->hasMany(Commerce_Payment::class);
    }
}
