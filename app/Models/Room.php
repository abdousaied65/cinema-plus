<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($admin_id)
 */
class Room extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','name_ar','address','address_ar','city_id'
    ];

    public function city(){
        return $this->belongsTo('\App\Models\City');
    }

    public function shows(){
        return $this->belongsToMany('\App\Models\Show','show_room','room_id','show_id','id','id');
    }

    public function halls(){
        return $this->belongsToMany('\App\Models\Hall','show_hall','room_id','hall_id','id','id');
    }

    public function seats(){
        return $this->hasMany('\App\Models\ShowSeat');
    }
}
