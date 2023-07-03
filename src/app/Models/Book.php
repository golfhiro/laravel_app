<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function technology_tags()
    {
        return $this->belongsToMany(TechnologyTag::class, 'book_technology_tags');
    }

    protected $fillable = [
        'title',
        'description',
        'url',
        'image',
        'user_id',
    ];
}
