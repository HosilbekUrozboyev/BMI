<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Food;
use App\Models\Menu;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        $menu = Menu::all();
        return view('admin.food.index', compact('foods','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $limit_calory = Day::find($request->time)->calory;
        $now_calory = Menu::find($request->menu_id)->calory;
        $old_calory = 0;
        $week = date('w', strtotime($request->date));
        $foods = Food::where('week', $week)->where('time', $request->time)->get();
        foreach ($foods as $food) {
            $old_calory += Menu::find($food->menu_id)->calory;
        }
        if ($old_calory + $now_calory > $limit_calory) {
            return redirect()->back()->with('error', 'Kaloriya chegarasidan oshib ketdi');
        }
        $food = new Food();
        $food->time = $request->time;
        $food->menu_id = $request->menu_id;
        $food->date = $request->date;
        $food->week = $week;
        $food->save();
        return redirect()->back()->with('success', 'Ovqat qo`shildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $week = date('w', strtotime($request->date));
        $food = Food::find($request->id);
        $food->time = $request->time;
        $food->menu_id = $request->menu_id;
        $food->date = $request->date;
        $food->week = $week;
        $food->save();
        return redirect()->back()->with('success', 'Ovqat yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->back()->with('success', 'Ovqat o`chirildi');
    }
}
