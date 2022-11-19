<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;

/**
 * @method static create(array $array)
 * @method static findOrFail($id)
 */
class Admin extends Authenticatable implements Auditable,MustVerifyEmail
{
    use Notifiable,HasRoles, SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admins';
    protected $guard = 'admin-web';
    protected $guard_name = 'admin-web';

    protected $fillable = [
        'name', 'email', 'password','type','role_name','Status'
    ];

    protected $auditStrict = true;

    protected $auditInclude = [
        'name', 'email', 'password','type','role_name','Status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'email_verified_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'role_name' => 'array',
    ];

    public function profile()
    {
        return $this->hasOne('\App\Models\Profile');
    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, 'admin.password.reset', 'admins'));
    }


    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification('admin.verification.verify'));
    }

}
