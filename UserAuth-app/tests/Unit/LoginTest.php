<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class LoginRedirectTest extends TestCase
{
    use RefreshDatabase; // If you need to reset the database after each test

    /** @test */
    public function user_redirected_to_dashboard_after_login()
    {

        
        $user = factory(\App\Models\User::class)->create(); // Create a user

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password', // Assuming this is the user's password
        ]);

        $response->assertRedirect('/dashboard'); // Assert that the user is redirected to /dashboard after logging in
    }
}
