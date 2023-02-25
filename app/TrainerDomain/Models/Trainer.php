<?php

namespace App\TrainerDomain\Models;

use App\PokeDomain\Models\Pokemon;
use App\UserDomain\Models\User;
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
        'age',
        'user_id'
    ];

    public function capture_pokemon(): BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class,'trainer_pokemon')->withPivot('pokemon_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,);
    }

}

