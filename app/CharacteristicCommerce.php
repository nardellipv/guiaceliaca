<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class CharacteristicCommerce extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'commerce_id', 'characteristic_id'
    ];

    public function Characteristic()
    {
        return $this->belongsTo(Characteristics::class);
    }

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }
}
