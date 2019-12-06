<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name', 'ingredients', 'steps', 'photos','slug','user_id','category_id'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
