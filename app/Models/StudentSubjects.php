<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class StudentSubjects extends Model
{
    protected $table = "student_subscribed_subjects";

    public function user()
    {
        return $this->hasMany(User::class,'id');
    }
}
