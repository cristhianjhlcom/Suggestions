<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function login_page_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login.index');
    }

    #[Test]
    public function register_page_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertViewIs('auth.register.index');
    }

    #[Test]
    public function users_can_authenticate_using_the_login_screen()
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect(route('home.index'));
    }

    #[Test]
    public function users_cant_authenticate_with_invalid_password()
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    #[Test]
    public function users_can_logout()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $this->assertAuthenticated();

        $response = $this->post('/logout');

        $this->assertGuest();

        $response->assertRedirect('/');
    }
}
