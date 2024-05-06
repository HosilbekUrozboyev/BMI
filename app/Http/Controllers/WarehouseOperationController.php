<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Models\WarehouseOperation;
use Illuminate\Http\Request;

class WarehouseOperationController extends Controller
{
    public function index()
    {
        $products = Warehouse::all();
//        $warehouses = WarehouseOperation::orderby('date', 'desc')->get();
        return view('admin.warehouse_operations.index', compact('products'));
    }

    public function store(Request $request){
//        dd($request);
        WarehouseOperation::create($request->all());
        $warehouse = Warehouse::find($request->warehouse_id);
        $warehouse->count += $request->count;
        $warehouse->save();
        return redirect()->back()->with('success', 'Maxsulot muvaffaqiyatli qabul qilindi');
    }
}
