<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
	public function a_post_can_be_created()
	{
        $this->withoutExceptionHandling();

        $response = $this->post('/api/usuarios/register', [
            "name" => "Lucia",
			"email" => "test5@test.com",
			"password" => "lima2021",
		]);

        $response->assertStatus(200);
    }

    /** @test */
	public function a_post_can_be_login()
	{
        $this->withoutExceptionHandling();

        $response = $this->post('/api/usuarios/login', [
            "name" => "Lucia",
			"email" => "test5@test.com",
			"password" => "lima2021",
		]);

        $response->assertStatus(200);
    }

    /** @test */
	public function a_post_can_be_info()
	{
        $this->withoutExceptionHandling();

        $response = $this->post('/api/usuarios/userinfo', [
            "name" => "Lucia",
			"email" => "test5@test.com",
			"password" => "lima2021",
		]);

        $response->assertStatus(200);
    }

}
