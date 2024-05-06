<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        return view('admin.days.edit');
    }

    public function store(Request $request){
        $day = Day::find(1);
        $day->calory = $request->id_1;
        $day->save();
        $day = Day::find(2);
        $day->calory = $request->id_2;
        $day->save();
        $day = Day::find(3);
        $day->calory = $request->id_3;
        $day->save();
        return redirect()->back()->with('success', 'Данные успешно обновлены');
    }
}
