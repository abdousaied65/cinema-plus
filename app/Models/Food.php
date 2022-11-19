<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static findOrFail($id)
 */
class Food extends Model
{
    use SoftDeletes;
    protected $table = 'foods';
    protected $fillable = [
        'name', 'name_ar', 'type_id','image','price','description','description_ar'
    ];

    public function type()
    {
        return $this->belongsTo('\App\Models\FoodType');
    }
}
