<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'Fname',
        'Lname',
        'DoB',
        'gender',
        'personal_id',
        'email',
        'user_mobile',
        'password',
        'user_role',
        'address',
        'HIC_id'
    ];

    protected $dates = ['DoB'];

    public function hic()
    {
        return $this->belongsTo(HIC::class, 'HIC_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function prescriptions() // Add this method
    {
        return $this->hasMany(Prescription::class); // This defines the relationship
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
