<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Payment extends Model
{
    protected $table = "payments";
    protected $fillable = [
      'user_id' , 'payment_option' , 'card_number','name_on_card','expiration','cvv','amount'
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
