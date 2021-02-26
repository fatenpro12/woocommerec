<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use HasMediaTrait;
    use HasFactory, Notifiable,HasRoles;

    const USER_ROLE_ADMIN_USER = 'admin';

    const USER_ROLE_vendor_USER = 'vendor';

    const USER_ROLE_client_USER = 'client';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $appends =['personal_image'];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function registerMediaCollections()
    {
        $this->addMediaCollection('personal_image')->singleFile();
    }
    public function getPersonalImageAttribute()
    {
        return $this->getFirstMedia('image');
    }
    public function isAdmin() : bool
    {
        return $this->hasRole(self::USER_ROLE_ADMIN_USER);
    }
    public static function getUsersByType(string $type)
    {
        return User::whereHas('roles' , function($q ) use ($type){
            $q->where('name', $type);
        })->get();
    }
}
