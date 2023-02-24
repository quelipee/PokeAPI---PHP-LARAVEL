<?php

namespace Tests\Feature;


use App\PokeDomain\Models\Pokemon;
use App\TrainerDomain\Models\Trainer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class TrainerTest extends TestCase
{
    public function test_user_create_trainer()
    {
        //prepare
        $payload = [
            'name' => 'felipe',
            'region' => 'galar',
            'age' => 25,
            'date' => 25
        ];

        //act
        $response = $this->post('api/create_trainer', $payload);

        //assert
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('trainers',['name' =>$payload['name']]);
    }

    public function test_trainer_can_capture_pokemon()
    {
        //prepare
        $model = Trainer::find(75);
        $pokemon = Pokemon::find(random_int(3,20));
        //act
        $response = $this->post('get_pokemon/' . $pokemon->id ,$model->toArray());
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_trainer_can_remove_pokemon()
    {
        //prepare
        $model = Trainer::find(75);
        //act
        $response = $this->post('remove_pokemon/' . 2 ,$model->toArray());
        //assert
        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    public function test_trainer_not_can_capture_pokemon_repeated()
    {
        //prepare
        $trainer = Trainer::find(75);
        $pokemon = Pokemon::find(1);
        //act
        $response = $this->post('get_pokemon/' . $pokemon->id ,$trainer->toArray());
        //assert
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
