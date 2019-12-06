<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Characteristics extends Model
{
    public $timestamps = false;

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }

    public function CharacteristicCommerce()
    {
        return $this->hasMany(CharacteristicCommerce::class);
    }
}
