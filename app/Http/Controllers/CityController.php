<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{

    public function show(Request $request, $id)
    {
        try{
            $boundary = $request->input('boundary');

            if($boundary){
                $city = City::with(['region', 'state', 'boundary'])->find($id);
            }else{
                $city = City::with(['region', 'state'])->find($id);
            }

            return $city ? $city : $this->notFound404();
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }

    public function citiesFromState(Request $request, $id){
        try{
            $boundary = $request->input('boundary');

            if($boundary){
                if (is_numeric($id)){
                    $cities = City::with(['region', 'state', 'boundary'])->where('id_state', $id)->get();
                }else{
                    $cities = City::with(['region', 'state', 'boundary'])->whereHas('state',
                    function ($query) use ($id){
                        return $query->where('initials', $id);
                    })->get();
                }
            }else{
                if (is_numeric($id)){
                    $cities = City::with(['region', 'state'])->where('id_state', $id)->get();
                }else{
                    $cities = City::with(['region', 'state'])->whereHas('state',
                    function ($query) use ($id){
                        return $query->where('initials', $id);
                    })->get();
                }
            }

            return $cities ? $cities : $this->notFound404();
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }

}
