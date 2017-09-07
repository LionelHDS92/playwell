<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function posts(){
        return $this->hasmany(post::class);
    }
}
