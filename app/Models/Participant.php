<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    protected $fillable = ['user_id'];

    public function rooms()
    {
        return $this->hasMany('App\Models\Classroom');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
