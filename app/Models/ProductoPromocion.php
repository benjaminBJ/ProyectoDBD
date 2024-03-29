<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPromocion extends Model
{
    use HasFactory;
    public function producto(){
        return
        $this->belongsTo('App\Models\Producto');
    }
    public function promocion(){
        return
        $this->belongsTo('App\Models\Promocion');
    }
}
