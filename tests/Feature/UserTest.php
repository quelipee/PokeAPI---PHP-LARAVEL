<?php

namespace Tests\Feature;

use App\UserDomain\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserTest extends TestCase
{
//    use RefreshDatabase;
    public function test_created_user()
    {
        //prepare
        $payload = [
            'email' => 'joaos@gmail.com',
            'password' => 123,
            'name' => 'joaos',
            'region' => 'galar',
            'age' => 25,
        ];

        //act
        $response = $this->post('register', $payload);

        //assert
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('trainers',['name' =>$payload['name']]);
    }

    public function test_user_can_login()
    {
        //preapre
        $payload = [
            'email' => 'fe@gmail.com',
            'password' => 123
        ];
        //act
        $response = $this->post('login', $payload);
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('users',['email' =>$payload['email']]);
    }

    public function test_user_can_logout()
    {
        //prepare
        $model = User::first();
        //act
        $response = $this->actingAs($model)->get('logout');
        //assert
        $response->assertStatus(Response::HTTP_FOUND);
    }
}
