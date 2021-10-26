<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonSeat extends Model
{
    use HasFactory;
    public function Salon(){
        return $this->belongsTo(Salon::class,'salon_id');
    }
    public function Requests(){
        return $this->hasMany(Request::class,'salon_seat_id','id');
    }
}
