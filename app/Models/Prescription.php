<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'pre_details',
        'user_id', // Add this field to fillable
        'submited_at'
    ];

    protected $dates = ['submited_at'];

    public function user() // Add this method
    {
        return $this->belongsTo(User::class); // This defines the inverse relationship
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'pre_id');
    }

    public function meds()
    {
        return $this->belongsToMany(Med::class, 'pre_meds')
            ->withPivot('quantity', 'notes')
            ->withTimestamps();
    }
}
