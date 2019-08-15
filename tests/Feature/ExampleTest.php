<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testBasicTest()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /** @test */
    function basicTest()
    {
        $user = factory(User::class)->create([
            'name'=> 'Duilio Palacios',
            'email'=> 'em_di-es@hotmail.com',
        ]);

        $response = $this->actingAs($user, 'api')
            ->get('api/user');
        
        $response->assertSee('Duilio Palacios')
            ->assertSee('em_di-es@hotmail.com');
    }

}
