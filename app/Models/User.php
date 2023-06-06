<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'firstname', 'lastname', 'email', 'country', 'password'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
