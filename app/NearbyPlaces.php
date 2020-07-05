<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NearbyPlaces extends Model
{
    //
	public function property()
	{
		$this->belongTo("App\property");
	}
}
