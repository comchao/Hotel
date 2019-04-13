<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password',
        'staff_name','staff_birth','staff_age',
        'staff_height','staff_weight','staff_role_reception',
        'staff_role_housekeeping','staff_role_food_and_beverage','staff_pos',
        'staff_address','staff_address2','staff_address3',
        'staff_province','staff_phone','staff_status','staff_previous_job',
        'staff_pic','staff_file','staff_note'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
}
