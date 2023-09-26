<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specie',
        'breed',
        'birth_date',
        'owner_id',
    ];

    /**
    * Get the owner that owns the animal.
    */
    public function owners()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    /**
    * Get all of the consultations for the animal.
    */
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
