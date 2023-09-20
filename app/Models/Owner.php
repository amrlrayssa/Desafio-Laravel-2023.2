<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'email',
        'cpf',
        'birth_date',
        'address',
        'phone'
    ];

    /**
    * Get all of the animals for the owner.
    */
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
