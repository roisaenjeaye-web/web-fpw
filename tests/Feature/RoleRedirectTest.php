<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_is_redirected_to_dashboard_after_login(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@test.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@test.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('dashboard'));
    }

    public function test_kasir_is_redirected_to_pos_after_login(): void
    {
        $kasir = User::factory()->create([
            'email' => 'kasir@test.com',
            'password' => 'password',
            'role' => 'kasir',
        ]);

        $response = $this->post('/login', [
            'email' => 'kasir@test.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('pos.index'));
    }

    public function test_admin_can_access_dashboard(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/dashboard');

        $response->assertOk();
    }

    public function test_kasir_cannot_access_dashboard_and_receives_403(): void
    {
        $kasir = User::factory()->create(['role' => 'kasir']);

        $response = $this->actingAs($kasir)->get('/dashboard');

        $response->assertStatus(403);
    }

    public function test_authenticated_kasir_visiting_login_is_redirected_to_pos(): void
    {
        $kasir = User::factory()->create(['role' => 'kasir']);

        $response = $this->actingAs($kasir)->get('/login');

        $response->assertRedirect(route('pos.index'));
    }

    public function test_authenticated_kasir_visiting_root_is_redirected_to_pos(): void
    {
        $kasir = User::factory()->create(['role' => 'kasir']);

        $response = $this->actingAs($kasir)->get('/');

        $response->assertRedirect(route('pos.index'));
    }

    public function test_kasir_can_access_pos_page(): void
    {
        $kasir = User::factory()->create(['role' => 'kasir']);

        $response = $this->actingAs($kasir)->get('/pos');

        $response->assertOk();
    }

    public function test_kasir_can_access_pos_history_page(): void
    {
        $kasir = User::factory()->create(['role' => 'kasir']);

        $response = $this->actingAs($kasir)->get('/pos/history');

        $response->assertOk();
    }

    public function test_admin_can_access_products_page(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/products');

        $response->assertOk();
    }
}
