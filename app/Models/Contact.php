<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($admin_id)
 */
class Contact extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','email','phone','subject','message','status'
    ];

}
