<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['code', 'name', 'url', 'image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }

    public function want_users()
    {
        $this->user()->where('type', 'want')->count();
        return $this->users()->where('type', 'want');
    }

    public function have_users()
    {
        $this->user()->where('type', 'have')->count();
        return $this->users()->where('type', 'have');
    }
}