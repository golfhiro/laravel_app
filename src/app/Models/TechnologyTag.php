<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyTag extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_technology_tags');
    }

    protected $fillable = ['name'];
}
