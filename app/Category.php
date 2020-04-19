<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function kuesioners(){
      return  $this->hasMany(Kuesioner::class);
    }

    public function users(){
        return  $this->belongsTo(User::class);
      }
}
