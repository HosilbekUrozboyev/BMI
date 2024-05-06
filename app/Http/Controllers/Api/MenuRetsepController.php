<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Retsep;
use Illuminate\Http\Request;

class MenuRetsepController extends Controller
{
    public function get_food_date(Request $request){
        $id = $request->id;
        $retseps = Retsep::with("warehouse")->where("menu_id", $id)->get();
        return response()->json($retseps, 200);
    }
}
