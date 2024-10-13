<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preMed extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'notes',
        'pre_id',
        'med_id'
    ];
}
