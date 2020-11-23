<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CarbonFootprints;
use Cache;

class CarbonFootprintController extends Controller
{
    public function getFootprint()
    { 
        #region[using get request to get response from 3rd Party API]
        $response = Http::get('https://api.triptocarbon.xyz/v1/footprint', [
            'activity' => request()->activity,
            'activityType'=>'miles',
            'country'=>request()->country,
            'mode'=>request()->mode
        ]); 
        #endregion  

        $footprint_value= json_decode($response->getBody()->getContents());//decoding the response to Json
        if($footprint_value)//checking if the value is not empty
        {
            request()->request->set("carbon_footprint",$footprint_value->carbonFootprint);
            if(CarbonFootprints::create(request()->all()))//Check if entry is made in DB an
            {
                Cache::put('carbon_footprint', $footprint_value->carbonFootprint, 86400); //storing value in cache for 1 days=86400 secs
                return back()->with('carbon_footprint',$footprint_value->carbonFootprint);
            }          
        }
        else
        {
            return back()->with('carbon_footprint','No value detected');
        }       
    }
}
