<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname','phone','level','code','status',
        'email',
        'password',
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
        'email_verified_at' => 'datetime',
    ];
    public function farmers(){

        return $this->hasOne(Farmer::class);
    }
    public function farms(){
        return $this->hasMany(Farm::class);
    }
    public function customers(){
        return $this->hasMany(Customer::class);
    }
    public function expenses(){
        return $this->hasMany(Expense::class);
    }
    public function stocks(){
        return $this->hasMany(Stock::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function seasons(){
        return $this->hasMany(Season::class);
    }
    public function crop(){
        return $this->hasMany(Crops::class);
    }
    public function cropfarms(){
        return $this->hasMany(Cropfarm::class);
    }
}
