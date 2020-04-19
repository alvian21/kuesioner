<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    public function categories()
    {
       return $this->belongsTo(Category::class);
    }
}
