<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use App\Models\Level;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Level::factory(1)->create(['id' => 1, 'name' =>'Desenvolvimento', 'description' => 'Desenvolvedores do sistema, possuem acesso liberado à todas as funcionalidades']);
        Level::factory(1)->create(['id' => 2, 'name' =>'Admin', 'description' => 'Responsáveis pela gestão dos usuários colaboradores e controle de acesso ao sistema']);
        Level::factory(1)->create(['id' => 3, 'name' =>'Colaboradores', 'description' => 'Colaboradores da empresa, possuem acesso limitado apenas aos recursos relacionados a eles']);

        Company::factory(1)->create(['id' => 1, 'name' =>'Orion Tecnologia e Sistemas Agrícolas LTDA', 'trading_name' => 'Orion', 'slug' => 'orion', 'domain' => 'orion.ind.br']);

        Department::factory(1)->create(['id' => 1, 'name' =>'Almoxarifado', 'company_id' => 1]);
        Department::factory(1)->create(['id' => 2, 'name' =>'Expedição', 'company_id' => 1]);
        Department::factory(1)->create(['id' => 3, 'name' =>'Financeiro', 'company_id' => 1]);
        Department::factory(1)->create(['id' => 4, 'name' =>'Tecnologia', 'company_id' => 1]);
        Department::factory(1)->create(['id' => 5, 'name' =>'PCP', 'company_id' => 1]);
        Department::factory(1)->create(['id' => 6, 'name' =>'Produção', 'company_id' => 1]);
        Department::factory(1)->create(['id' => 7, 'name' =>'Qualidade', 'company_id' => 1]);

        Role::factory(1)->create(['id' => 1, 'name' =>'Gerente de Desenvolvimento de Sistemas', 'description' => 'Lidera e gerencia equipe de TI']);
        Role::factory(1)->create(['id' => 2, 'name' =>'Gerente Financeiro', 'description' => 'Bla bla bla']);
        Role::factory(1)->create(['id' => 3, 'name' =>'Auxiliar de Produção', 'description' => 'Bla bla bla']);

        User::factory(1)->create(['id'=>1,'email'=>'osz.jessica@gmail.com', 'email_verified_at' => now(), 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'remember_token' => Str::random(10), 'level_id'=>1]);
        User::factory(1)->create(['id'=>2,'email'=>'camila@mailinator.com', 'email_verified_at' => now(), 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'remember_token' => Str::random(10), 'level_id'=>2, 'role_id' => 2]);
        User::factory(1)->create(['id'=>3,'email'=>'nataly@mailinator.com', 'email_verified_at' => now(), 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'remember_token' => Str::random(10), 'level_id'=>3, 'role_id' => 3]);
    }
}
