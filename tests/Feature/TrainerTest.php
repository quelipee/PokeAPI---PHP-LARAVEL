<?php

namespace Tests\Feature;


use App\PokeDomain\Models\Pokemon;
use App\UserDomain\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TrainerTest extends TestCase
{
    public function test_trainer_can_capture_pokemon()
    {
        //prepare
        $model = User::first();
        Session::start();
        $pokemon = Pokemon::find(random_int(3,20));
        $name = ['name' => $pokemon->name];
        //act
        $response = $this->actingAs($model)->post('get_pokemon/' . $pokemon->id, $name);
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_trainer_can_remove_pokemon()
    {
        //prepare
        $model = User::first();
        $pokemon = Pokemon::find(17);
        Session::start();
        //act
        $response = $this->actingAs($model)->post('remove_pokemon/' . $pokemon->id );
        //assert
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function test_trainer_not_can_capture_pokemon_repeated()
    {
        //prepare
        $trainer = User::first();
        $pokemon = Pokemon::find(117);
        $name = ['name' => $pokemon->name];
        Session::start();
        //act
        $response = $this->actingAs($trainer)->post('get_pokemon/' . $pokemon->id,$name);
        //assert
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function test_user_can_update_status()
    {
        //preapre
        $payload = [
          'name' => 'felipe',
          'age' => '15',
          'region' => 'marlar'
        ];
        $user = User::first();
        //act
        $response = $this->actingAs($user)->post('api/profile_update', $payload);
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('trainers',['region' => $payload['region']]);
    }
}
