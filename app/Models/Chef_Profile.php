<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef_Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_picture',
        'cover_photo',
        'name',
        'skills',
        'bio',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
