<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($admin_id)
 */
class Profile extends Model
{
    protected $fillable = [
        'phone_number',
        'city_name',
        'age',
        'gender',
        'profile_pic',
        'admin_id'
    ];
    public function admin()
    {
        return $this->belongsTo('\App\Models\Admin');
    }
}
