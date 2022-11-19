<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($admin_id)
 */
class Gift extends Model
{
    use SoftDeletes;
    protected $table = 'gifts';
    protected $fillable = [
        'name','name_ar','description','description_ar','expiration_date','gift_price','image'
    ];

}
