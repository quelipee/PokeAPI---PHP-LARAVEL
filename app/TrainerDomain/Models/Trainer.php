<?php

namespace App\TrainerDomain\Models;

use App\PokeDomain\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Trainer extends Model
{
    use HasFactory;

    protected $table = 'trainers';
    protected $fillable = [
        'id',
        'name',
        'region',
        'age'
    ];

    public function capture_pokemon(): BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class,'trainer_pokemon')->withPivot('pokemon_id');
    }

}

