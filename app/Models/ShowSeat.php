<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class ShowSeat extends Model
{
    protected $table = 'show_seat';
    protected $fillable = [
        'show_id','room_id','hall_id','day','date','time','seat','ticket_price'
    ];
    public function show(){
        return $this->belongsTo('App\Models\Show');
    }
    public function room(){
        return $this->belongsTo('App\Models\Room');
    }
    public function hall(){
        return $this->belongsTo('App\Models\Hall');
    }
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }
}
