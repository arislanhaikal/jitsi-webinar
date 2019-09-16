<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $guarded = [];

    protected $fillable = ['class', 'slug'];

    public function participants()
    {
        return $this->hasMany('App\Models\Participant');
    }

    public function getTotalParticipantAttribute()
    {
        return $this->participants()->count();
    }
}
