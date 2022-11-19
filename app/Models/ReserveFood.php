<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string)
 * @method static orderBy(string $string, string $string1)
 */
class ReserveFood extends Model
{
    protected $table = 'reserve_food';
    protected $fillable = [
        'user_id','food_id','quantity','unit_price','quantity_price','status'
    ];
    public function food()
    {
        return $this->belongsTo('App\Models\Food');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
