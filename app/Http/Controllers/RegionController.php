<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        try{
            $boundary = $request->input('boundary');

            if($boundary){
                $regions = Region::with('boundary')->get();
            }else{
                $regions = Region::all();
            }

            return $regions ? $regions : $this->notFound404();
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }

    public function show(Request $request, $id)
    {
        try{
            $boundary = $request->input('boundary');

            if($boundary){
                $region = Region::with('boundary')->find($id);
            }else{
                $region = Region::find($id);
            }

            return $region ? $region : $this->notFound404();
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }

}
