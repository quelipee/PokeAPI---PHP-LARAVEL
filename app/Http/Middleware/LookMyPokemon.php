<?php

namespace App\Http\Middleware;

use App\PokeDomain\Models\Pokemon;
use App\TrainerDomain\Models\Trainer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LookMyPokemon
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $trainer = Trainer::find(Auth::id());
        $pokeId = $request->segment(2);
        $poke = Pokemon::find($pokeId);

        foreach ($trainer->capture_pokemon as $poke_trainer)
        {
            if (strtolower($poke_trainer->name) != strtolower($poke->name))
            {
                return \response()->redirectToRoute('index')->withErrors(['error' => 'Oops, você não possui este pokemon.']);
            }
        }
        return $next($request);
    }
}
