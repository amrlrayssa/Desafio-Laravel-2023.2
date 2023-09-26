<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'treatment',
        'initial_date',
        'final_date',
        'price',
        'user_id',
        'animal_id',
    ];

    /**
    * Get the user that create the consultation.
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
    * Get the animal that owns the consultation.
    */
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
