<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($admin_id)
 */
class Hall extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','name_ar','ticket_price'
    ];

    public function shows(){
        return $this->belongsToMany('\App\Models\Show','show_hall','hall_id','show_id','id','id');
    }
    public function rooms(){
        return $this->belongsToMany('\App\Models\Room','show_hall','hall_id','room_id','id','id');
    }
    public function seats(){
        return $this->hasMany('\App\Models\ShowSeat');
    }
}
