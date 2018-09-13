<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAssign extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function teacher()
    {
        return $this->belongsTo('App\User');
    }
}
