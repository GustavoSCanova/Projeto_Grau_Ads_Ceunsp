<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissaoSeeder extends Seeder
{
    public function run()
    {
        // Cria permissões
        Permission::firstOrCreate(['name' => 'dashboard']);

        // Cria papel e atribui permissões
        $professorRole = Role::firstOrCreate(['name' => 'professor']);
        $professorRole->givePermissionTo('dashboard');

        // Atribui papel ao usuário
        $user = User::where('email', 'professor@exemplo.com')->first();
        if ($user) {
            $user->assignRole('professor');
        }
    }
}

