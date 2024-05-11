<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'street_name',
        'street_address',
        'zip_code',
        'state',
        'country',
        'lat',
        'lng'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
