<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function teacher()
    {
        return $this->belongsTo('App\User', 'teacher_id');
    }
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
}
