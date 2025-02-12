<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    //

    public function payment()
    {
        return $this->belongsTo(Orders::class);
    }
}
