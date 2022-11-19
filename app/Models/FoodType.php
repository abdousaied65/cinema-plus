<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail($id)
 */
class FoodType extends Model
{
    use SoftDeletes;
    protected $table = 'foods_types';
    protected $fillable = [
        'name','name_ar'
    ];

    public function foods()
    {
        return $this->hasMany('\App\Models\Food');
    }
}
