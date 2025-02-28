<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;
     public function category(){
        return $this->belongsTo(Category::class);
    }
     public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected function image(): Attribute{
        return Attribute::make(
            get: fn($value) => asset('storage/'.$this->thumnail),
        );
    }
}
