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
    ];

    /**
    * Get the user that create the consultation.
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
    * Get the animal that owns the consultation.
    */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
