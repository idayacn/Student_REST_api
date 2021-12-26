<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;
// USE Illuminate\Database\Eloquent\HasFactory;

class Subject extends Model
{
    // use HasFactory;
    protected $table = "subject";
    
    protected $fillable = [
        'title', 'description','module_details'
    ];

    public function users()
    {
        return $this->hasMany(User::class,'id');
    }
}
