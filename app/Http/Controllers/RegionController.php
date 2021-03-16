<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        try{
            $regions = Region::all();
            return $regions ? $regions : $this->notFound404();
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }

    public function show($id)
    {
        try{
            $region = Region::find($id);
            return $region ? $region : $this->notFound404();
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }

}
