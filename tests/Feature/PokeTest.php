<?php

namespace Tests\Feature;

use App\UserDomain\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class PokeTest extends TestCase
{
//    use RefreshDatabase;

    public function test_get_PokeAPI()
    {
        //prepare

        //act
        $response = $this->get('api/getPoke');
        //assert
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_insert_pokeAPI_in_DTO()
    {
        //prepare

        //act
        $response = $this->get('api/insertPokeAPIDTO');
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_insert_bd()
    {
        //prepare

        //act
        $response = $this->get('api/insertBD');
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_get_all_pokemons()
    {
        //prepare
        $user = User::first();
        //act
        $response = $this->actingAs($user)->get('api/get_all_pokemons');
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
    }
}
