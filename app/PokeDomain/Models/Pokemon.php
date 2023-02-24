<?php

namespace App\PokeDomain\Models;

use App\TrainerDomain\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';

    protected $fillable = [
        'id',
        'name',
        'statusAPI',
        'img_url',
        'attribute',
    ];

    public function trainer_pokemon(): BelongsToMany
    {
        return $this->belongsToMany(Trainer::class,'trainer_pokemon')->withPivot('trainer_id');
    }
}
