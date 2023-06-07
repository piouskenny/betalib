<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'image_path', 'about', 'facebook', 'twitter', 'instagram'];

    public function users() {
        return $this->belongsTo(User::class);
    }
}
