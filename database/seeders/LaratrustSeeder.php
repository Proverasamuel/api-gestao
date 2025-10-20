<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Laratrust\Models\Role;
use Laratrust\Models\Permission;

class LaratrustSeeder extends Seeder
{
    public function run(): void
    {
        // Criar roles
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Acesso total ao sistema'
        ]);

        $funcionario = Role::create([
            'name' => 'funcionario',
            'display_name' => 'Funcionário',
            'description' => 'Pode gerir vendas'
        ]);

        $gestor = Role::create([
            'name' => 'gestor',
            'display_name' => 'Gestor',
            'description' => 'Pode visualizar relatórios e gerir stock'
        ]);

        // Criar permissões
        $criarVenda = Permission::create([
            'name' => 'criar-venda',
            'display_name' => 'Criar venda',
        ]);

        $verRelatorios = Permission::create([
            'name' => 'ver-relatorios',
            'display_name' => 'Ver relatórios',
        ]);

        // Associar permissões aos roles
        $admin->permissions()->sync([$criarVenda->id, $verRelatorios->id]);
        $funcionario->permissions()->sync([$criarVenda->id]);
        $gestor->permissions()->sync([$verRelatorios->id]);

        // Criar um user admin
        $user = User::create([
            'name' => 'Ademar Mendes',
            'email' => 'ademar.mendes@visorking.com',
            'password' => bcrypt('12345678')
        ]);

        // Associar role ao user
        $user->roles()->attach($admin->id);
    }
}
