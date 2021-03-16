<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function notFound404(){
        return response()->json(['error' => ['messages' => ['Not found']] ], 404);
    }

    protected function internalServerError500(\Exception $ex){
        return response()->json(['error' => ['msg' => [$ex->getMessage()]] ], 500);
    }

}
