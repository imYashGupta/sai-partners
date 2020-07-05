<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $appends=["fullname","imageURL","socials"];

    public function getFullnameAttribute()
    {
    	return $this->firstname." ".$this->lastname;
    }

    public function getImageURLAttribute()
    {
    	return config("app.filePATH")."team/".$this->image;
    }

    public function getSocialsAttribute()
    {
    	$social=json_decode($this->social);
    	return $social;
    }

}
