<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //  public function products()
    public function order(){
        return $this->belongsTo(Orders::class);
    }
}
