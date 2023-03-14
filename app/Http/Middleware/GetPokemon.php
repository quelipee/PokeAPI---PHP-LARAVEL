<?php

namespace App\Http\Middleware;

use App\PokeDomain\Models\Pokemon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetPokemon
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $poke = $this->getPoke($request);

        if (strtolower($request->name) != $this->getPokename($poke) and $request->name != null)
        {
            return redirect()->back()->withErrors(['pokemon_name' => 'Oops, o nome do pokemon na imagem é diferente do que você digitou.']);
        }

        if (strtolower($request->type) != $poke->attribute and $request->type != null)
        {
            return redirect()->back()->withErrors(['pokemon_name' => 'Oops, o nome do pokemon na imagem é diferente do que você digitou.']);
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getPoke(Request $request)
    {
        $id = $request->segment(2);
        return Pokemon::find($id);
    }

    /**
     * @param mixed $poke
     * @return string
     */
    public function getPokename(mixed $poke): string
    {
        return strtolower(str_replace('-', ' ', $poke->name));
    }
}
