<?php

namespace guiaceliaca;

use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'web', 'twitter', 'instagram', 'facebook', 'logo', 'slug', 'about', 'votes_positive', 'votes_negative',
        'user_id', 'province_id', 'region_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Messages()
    {
        return $this->hasMany(Message::class);
    }

    public function Region()
    {
        return $this->belongsTo(Region::class);
    }


    public function Province()
    {
        return $this->belongsTo(Province::class);
    }


    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function Promotion()
    {
        return $this->hasMany(Promotion::class);
    }


    public function Characteristic()
    {
        return $this->belongsToMany(Characteristic::class);
    }

    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }
}
