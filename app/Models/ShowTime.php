<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class ShowTime extends Model
{
    protected $table = 'show_time';
    protected $fillable = [
        'show_id','day','time'
    ];
    public function show(){
        return $this->belongsTo('App\Models\Show');
    }
}
