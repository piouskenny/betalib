<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['book_title', 'book_author', 'book_cover', 'date_written', 'description'];

    public function BookFile(){
        return $this->hasOne(BookFile::class);
    }
    
    public function Review() {
        return $this->hasMany(Review::class);
    }
}
