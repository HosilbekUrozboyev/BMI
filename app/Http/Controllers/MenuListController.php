<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class MenuListController extends Controller
{
    public function index(){
        $date = date('w', strtotime(now()->timezone('Asia/Tashkent')));
        $menu = Food::all();
        $array = [
            "1" => [
                "1" => [],
                "2" => [],
                "3" => [],
            ],
            "2" => [
                "1" => [],
                "2" => [],
                "3" => [],
            ],
            "3" => [
                "1" => [],
                "2" => [],
                "3" => [],
            ],
            "4" => [
                "1" => [],
                "2" => [],
                "3" => [],
            ],
            "5" => [
                "1" => [],
                "2" => [],
                "3" => [],
            ],
            "6" => [
                "1" => [],
                "2" => [],
                "3" => [],
            ],
        ];
        foreach ($menu as $item)
            $array[$item->week][$item->time][] = $item;
        $menu = $array;
        return view('admin.menu-list', compact('menu'));
    }
}
