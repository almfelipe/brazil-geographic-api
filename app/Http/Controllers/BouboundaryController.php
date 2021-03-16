<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BouboundaryController extends Controller
{

    private function reverseGeocodeQuery($latitude, $longitude){
        try{
            $query = "
                select
                    boundary.id_region as region_id,
                    region.name as region_name,
                    boundary.id_state as state_id,
                    state.name as state_name,
                    boundary.id_city as city_id,
                    city.name as city_name
                from
                    boundary
                    join region on region.id = boundary.id_region
                    join state on state.id = boundary.id_state
                    join city on city.id = boundary.id_city
                where
                    boundary.id_city is not null and
                    st_contains(
                        boundary.geometry_shape,
                        point(:latitude, :longitude)
                    ) = 1
                limit 1
            ";

            $reverseGeocode = DB::select(DB::raw($query), ["latitude" => $latitude, "longitude" => $longitude]);

            if(count($reverseGeocode) > 0){
                return response()->json(['reversegeocode' => $reverseGeocode[0]]);
            }else{
                return $this->notFound404();
            }
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }

    public function reverseGeocode(Request $request){
        $validator = Validator::make($request->all(), [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 500);
        }

        return $this->reverseGeocodeQuery($request->input('latitude'), $request->input('longitude'));
    }
}
