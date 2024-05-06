<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'warehouse_id',
        'count',
        'date',
    ];

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
