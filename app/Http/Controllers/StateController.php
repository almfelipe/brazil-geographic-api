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
                $states = State::with('boundary')->get();
            }else{
                $states = State::all();
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
                    $state = State::with('boundary')->find($id);
                }else{
                    $state = State::with('boundary')->where('initials', $id)->first();
                }
            }else{
                if (is_numeric($id)){
                    $state = State::find($id);
                }else{
                    $state = State::where('initials', $id)->first();
                }
            }

            return $state ? $state : $this->notFound404();
        }catch(\Exception $ex){
            return $this->internalServerError500($ex);
        }
    }
}
