<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string)
 * @method static orderBy(string $string, string $string1)
 * @method static findOrFail($id)
 */
class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'user_id','seat_id','status'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function seat()
    {
        return $this->belongsTo('App\Models\ShowSeat');
    }
}
