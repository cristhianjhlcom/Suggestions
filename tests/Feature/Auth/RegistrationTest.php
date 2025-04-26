<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function new_users_can_register()
    {
        $response = $this->post('/register', [
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect(route('home.index'));

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }

    #[Test]
    public function registration_requires_valid_email()
    {
        $response = $this->post('/register', [
            'email' => 'not-an-email',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    #[Test]
    public function registration_requires_unique_email()
    {
        User::factory()->create([
            'email' => 'test@example.com'
        ]);

        $response = $this->post('/register', [
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    #[Test]
    public function registration_requires_password()
    {
        $response = $this->post('/register', [
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response->assertSessionHasErrors('password');
    }

    #[Test]
    public function registration_requires_password_confirmation()
    {
        $response = $this->post('/register', [
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'different-password',
        ]);

        $response->assertSessionHasErrors('password');
    }

    #[Test]
    public function authenticated_users_cannot_view_register_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/register');

        $response->assertRedirect(route('home.index'));
    }

    #[Test]
    public function authenticated_users_cannot_view_login_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect(route('home.index'));
    }
}
