<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderdetail()
    {
        return $this->hasMany(OrderDetails::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payments::class);
    }
}
