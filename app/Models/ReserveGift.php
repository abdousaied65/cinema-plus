<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string)
 * @method static orderBy(string $string, string $string1)
 */
class ReserveGift extends Model
{
    protected $table = 'reserve_gift';
    protected $fillable = [
        'sender_id','recipient_name','recipient_email','recipient_number','message','card_id','status'
    ];
    public function gift()
    {
        return $this->belongsTo('App\Models\Gift','card_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','sender_id','id');
    }
}
