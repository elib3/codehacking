<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    
    protected $uploads = '/images/';
    
    protected $fillable = ['file'];
    
    
    //Appending Values To JSON
    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
}
