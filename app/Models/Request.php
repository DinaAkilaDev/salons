<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    public function SalonSeat(){
        return $this->belongsTo(SalonSeat::class,'salon_seat_id');
    }
}
