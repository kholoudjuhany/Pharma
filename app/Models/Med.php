<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Med extends Model
{
    use HasFactory;
    protected $fillable = [
        'med_name',
        'med_quantity',
        'med_img',
        'med_price',
        'cat_id'
    ];

    // Defining the relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'pre_meds')
        ->withPivot('quantity', 'notes') // Includes pivot columns
        ->withTimestamps(); // Includes created_at and updated_at timestamps
    }
}
