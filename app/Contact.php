<?php

namespace App;

use App\Property;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $appends=["property"];

    public function getPropertyAttribute()
    {
    	if (!is_null($this->property_id)) {
    		return Property::find($this->property_id);
    	}
    }

        public function getCreatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y h:s A');
	}
}
