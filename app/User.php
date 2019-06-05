<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const PRIZES = [
        'money' => [
            1000,
            5000,
            10000,
            50000,
            80000,
            100000
        ],
        'bonus' => [
            20,
            50,
            60,
            80,
            250,
            550
        ],
        'items' => [
            'Car',
            'Phone',
            'Notebook',
            'Whatch',
            'Tv',
            'Headphone'
        ]
    ];

    protected $appends = ['user_money', 'user_bonus', 'user_item'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function user_prize(){
        return $this->hasMany(UserPrize::class);
    }

    public function getUserMoneyAttribute()
    {
        return $this->user_prize->sum('money');
    }

    public function getUserBonusAttribute()
    {
        return $this->user_prize->sum('bonus');
    }

    public function getUserItemAttribute()
    {
        $items = DB::table('user_prizes')->whereNotNull('items')->pluck('items')->toArray();
        return $items;
    }
}
