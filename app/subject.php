<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'subjectName', 
    ];
    public function students(){
        return $this->belongsToMany(student::class);
    }
}
