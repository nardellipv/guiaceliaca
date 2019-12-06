<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;

    public function Commerce()
    {
        return $this->belongsTo(Commerce::class);
    }
}
