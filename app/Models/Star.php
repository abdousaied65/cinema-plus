<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($admin_id)
 */
class Star extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','name_ar'
    ];

    public function movies(){
        return $this->belongsToMany('\App\Models\Movie','movie_star','star_id','movie_id','id','id');
    }
}
