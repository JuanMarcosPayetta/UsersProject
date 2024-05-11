<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class User extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'password',
        'first_name',
        'last_name',
        'username',
        'email',
        'avatar',
        'gender',
        'phone_number',
        'social_insurance_number',
        'date_of_birth'
    ];

    public function address(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Address::class)->withDefault();
    }

    public function employment(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Employment::class)->withDefault();
    }

    public function creditCard(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CreditCard::class)->withDefault();
    }

    public function subscription(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Subscription::class)->withDefault();
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


}
