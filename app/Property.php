<?php

namespace App;

use App\Flooring;
use App\NearbyPlaces;
use App\PropertyFeatures;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Property extends Model
{
    //
    protected $appends = ["fulladdress","timeago","images","amenities","nearbyplaces","floors","amount","category","thumbnail","thumb"];
    protected $fillable= ["views"];
 

    public function getFulladdressAttribute()
    {
    	return $this->address.','.$this->city.','.$this->postal.','.ucfirst($this->state).','.$this->country;
    }

    public function getCreatedAtAttribute($date)
	{
	    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
	}

    public function getTimeagoAttribute()
    {
        //return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d M,y h:i A');
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    }

 
    public function getImagesAttribute()
    {
        return DB::table("property_images")->where("token",$this->token)->get();

    }

    public function getAmenitiesAttribute()
    {
        return PropertyAmenities::where("token",$this->token)->get();
    }

    public function getNearbyPlacesattribute()
    {
        return NearbyPlaces::where("property_id",$this->id)->get();
    }

    public function getFloorsAttribute()
    {
        return Flooring::where("property_id",$this->id)->orderBy("floor_int","ASC")->get();
    }
    public function getAmountAttribute()
    {
        $num=$this->price;
        $explrestunits = "" ;
        if(strlen($num)>3) {
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++) {
                // creates each of the 2's group and adds a comma to the end
                if($i==0) {
                    $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                } else {
                    $explrestunits .= $expunit[$i].",";
                }
            }
            $thecash = $explrestunits.$lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
    }
    public function getCategoryAttribute()
    {
        $category=Category::find($this->type);
        if ($category!=null) {
            return $category->name;
        }
        return Category::find(1)->name;
    }

    public function getThumbnailAttribute()
    {
        $img=DB::table("property_images")->where("token",$this->token)->where("thumbnail",'1')->first();
        if (is_null($img)) {
            return asset("images/370-320.png");
        }
        return asset("images/property/370-320/".$img->name);

    }

    //global
    public function getThumbAttribute()
    {
        $img=DB::table("property_images")->where("token",$this->token)->where("thumbnail",'1')->first();
        if (is_null($img)) {
            return asset("images/170-110.png"); 
        }
        return asset("images/property/170-110/".$img->name);
    }
}
