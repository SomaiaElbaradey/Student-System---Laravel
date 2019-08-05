<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'name', 'degree', 
    ];
    public function subjects(){
        return $this->belongsToMany(subject::class);
    }
}
