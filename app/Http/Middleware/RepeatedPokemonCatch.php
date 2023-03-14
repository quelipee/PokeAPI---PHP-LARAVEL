<?php

namespace App\Http\Middleware;

use App\PokeDomain\Models\Pokemon;
use App\TrainerDomain\Models\Trainer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RepeatedPokemonCatch
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $trainer = Trainer::find(Auth::id());
        $pokeId = $request->segment(2);
        $poke = Pokemon::find($pokeId);
        $pokemons = [];

        foreach ($trainer->capture_pokemon as $poke_trainer)
        {
            $pokemons[] = $poke_trainer->name;
        }

        if (in_array($poke->name,$pokemons))
        {
            return response()->redirectToRoute('index')->withErrors(['error' => 'Oops, você já capturou este pokemon.']);
        }
        return $next($request);
    }
}
