<?php
namespace Tests\Feature\Controllers\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ResetPasswordControllerTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function it_shows_password_reset_request_form() : void
    {
        $response = $this->get('/password/reset');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_sends_password_reset_email()
    {
        Notification::fake();

        $user = factory(User::class)->create();
        $this->post('/password/email', ['email' => $user->email]);

        Notification::assertSentTo($user, ResetPassword::class);
    }

    /** @test */
    public function it_does_not_send_password_reset_email_for_invalid_user()
    {
        Notification::fake();

        $this->post('/password/email', ['email' => 'invalid@example.com']);

        Notification::assertNotSentTo([], ResetPassword::class);
    }

    /** @test */
    public function it_shows_password_reset_form()
    {
        $token = 'valid_token';
        $response = $this->get('/password/reset/'.$token);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_updates_password()
    {
        $user = factory(User::class)->create();
        $token = 'valid_token';

        $this->post('/password/reset', [
            'email' => $user->email,
            'password' => 'new_password',
            'password_confirmation' => 'new_password',
            'token' => $token,
        ]);

        $this->assertTrue(\Hash::check('new_password', $user->fresh()->password));
    }

    /** @test */
    public function it_does_not_update_password_with_invalid_token()
    {
        $user = factory(User::class)->create();

        $this->post('/password/reset', [
            'email' => $user->email,
            'password' => 'new_password',
            'password_confirmation' => 'new_password',
            'token' => 'invalid_token',
        ]);

        $this->assertFalse(\Hash::check('new_password', $user->fresh()->password));
    }
}

