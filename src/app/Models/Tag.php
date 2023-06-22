<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Tag extends Model
{
    protected $guarded = ['id'];

    public function books()
    {
        return $this->hasMany(Book::class, 'tag_id', 'id');
    }


}
