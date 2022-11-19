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
class Movie extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'name_ar',
        'story',
        'story_ar',
        'movie_pic'
    ];

    public function genres(){
        return $this->belongsToMany('\App\Models\Genre','movie_genre','movie_id','genre_id','id','id');
    }

    public function stars(){
        return $this->belongsToMany('\App\Models\Star','movie_star','movie_id','star_id','id','id');
    }

    public function shows()
    {
        return $this->hasMany('App\Models\Show');
    }

}
