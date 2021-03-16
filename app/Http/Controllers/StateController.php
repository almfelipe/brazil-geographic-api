<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(Request $request)
    {
        try{
            $boundary = $request->input('boundary');

            if($boundary){
                $states = State::with(['region', 'boundary'])->get();
            }else{
                $states = State::with(['region'])->get();
            }

            return $states ? $states : $this->notFound404();
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }

    public function show(Request $request, $id)
    {
        try{
            $boundary = $request->input('boundary');

            if($boundary){
                if (is_numeric($id)){
                    $state = State::with(['region', 'boundary'])->find($id);
                }else{
                    $state = State::with(['region', 'boundary'])->where('initials', $id)->first();
                }
            }else{
                if (is_numeric($id)){
                    $state = State::with(['region'])->find($id);
                }else{
                    $state = State::with(['region'])->where('initials', $id)->first();
                }
            }

            return $state ? $state : $this->notFound404();
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }
}
