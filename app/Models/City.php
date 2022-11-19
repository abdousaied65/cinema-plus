<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($admin_id)
 * @method static onlyTrashed()
 * @method static withTrashed()
 */
class City extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'name_ar'
    ];

    public function rooms()
    {
        return $this->hasMany('\App\Models\Room');
    }
}
