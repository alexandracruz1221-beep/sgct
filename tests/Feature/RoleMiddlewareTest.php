<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class RoleMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_without_the_required_role_are_denied(): void
    {
        $role = Role::create([
            'key' => 'coordinador',
            'nombre' => 'Coordinador',
            'descripcion' => 'Coordinador de sede',
            'estado' => 'activo',
        ]);

        $user = User::create([
            'name' => 'Usuario prueba',
            'email' => 'prueba@example.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
            'estado' => 'activo',
        ]);

        Route::get('/admin-only', function () {
            return 'ok';
        })->middleware('role:admin');

        $this->actingAs($user);

        $response = $this->get('/admin-only');

        $response->assertStatus(403);
    }

    public function test_users_with_the_required_role_can_access(): void
    {
        $role = Role::create([
            'key' => 'admin',
            'nombre' => 'Administrador',
            'descripcion' => 'Administrador del sistema',
            'estado' => 'activo',
        ]);

        $user = User::create([
            'name' => 'Admin prueba',
            'email' => 'adminprueba@example.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
            'estado' => 'activo',
        ]);

        Route::get('/admin-only', function () {
            return 'ok';
        })->middleware('role:admin');

        $this->actingAs($user);

        $response = $this->get('/admin-only');

        $response->assertOk();
        $response->assertSeeText('ok');
    }

    public function test_root_redirects_guests_to_login_and_authenticated_users_to_dashboard(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');

        $role = Role::create([
            'key' => 'admin',
            'nombre' => 'Administrador',
            'descripcion' => 'Administrador del sistema',
            'estado' => 'activo',
        ]);

        $user = User::create([
            'name' => 'Admin prueba',
            'email' => 'adminprueba2@example.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
            'estado' => 'activo',
        ]);

        $this->actingAs($user);

        $authenticatedResponse = $this->get('/');

        $authenticatedResponse->assertRedirect('/dashboard');
    }
}
