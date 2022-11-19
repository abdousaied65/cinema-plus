<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static findOrFail($id)
 */
class Show extends Model
{
    use SoftDeletes;

    protected $table = 'shows';
    protected $fillable = [
        'movie_id', 'start_date', 'end_date', 'days','status'
    ];
    protected $casts = [
        'days' => 'array'
    ];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    public function rooms()
    {
        return $this->belongsToMany('\App\Models\Room', 'show_room', 'show_id', 'room_id', 'id', 'id');
    }

    public function halls()
    {
        return $this->belongsToMany('\App\Models\Hall', 'show_hall', 'show_id', 'hall_id', 'id', 'id');
    }

    public function show_days()
    {
        return $this->hasMany('\App\Models\ShowDay');
    }

    public function times()
    {
        return $this->hasMany('\App\Models\ShowTime');
    }

}
