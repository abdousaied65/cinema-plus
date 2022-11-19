<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class ShowDay extends Model
{
    protected $table = 'show_day';
    protected $fillable = [
        'show_id','day','date'
    ];

    public function show()
    {
        return $this->belongsTo('\App\Models\Show');
    }
}
