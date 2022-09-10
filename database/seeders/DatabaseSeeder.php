<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Department;
use App\Models\Functionality;
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

        Functionality::factory(1)->create(['id' => 1, 'name' =>'CadastrarUsuarios', 'description' => 'Cadastrar usuários']);
        Functionality::factory(1)->create(['id' => 2, 'name' =>'ListarUsuarios', 'description' => 'Acessar listagem usuários']);
        Functionality::factory(1)->create(['id' => 3, 'name' =>'AcessarUsuario', 'description' => 'Acessar tela de informações de usuário cadastrado']);
        Functionality::factory(1)->create(['id' => 4, 'name' =>'CadastrarEmpresas', 'description' => 'Cadastrar empresas']);
        Functionality::factory(1)->create(['id' => 5, 'name' =>'ListarEmpresas', 'description' => 'Acessar listagem empresas']);
        Functionality::factory(1)->create(['id' => 6, 'name' =>'AcessarEmpresa', 'description' => 'Acessar tela de informações de empresa cadastrado']);
        Functionality::factory(1)->create(['id' => 7, 'name' =>'CadastrarRecursos', 'description' => 'Cadastrar recursos']);
        Functionality::factory(1)->create(['id' => 8, 'name' =>'ListarRecursos', 'description' => 'Acessar listagem recursos']);
        Functionality::factory(1)->create(['id' => 9, 'name' =>'AcessarRecurso', 'description' => 'Acessar tela de informações de recurso cadastrado']);
        Functionality::factory(1)->create(['id' => 10, 'name' =>'CadastrarDepartamentos', 'description' => 'Cadastrar departamentos']);
        Functionality::factory(1)->create(['id' => 11, 'name' =>'ListarDepartamentos', 'description' => 'Acessar listagem departamentos']);
        Functionality::factory(1)->create(['id' => 12, 'name' =>'AcessarDepartamento', 'description' => 'Acessar tela de informações de departamento cadastrado']);
        Functionality::factory(1)->create(['id' => 13, 'name' =>'CadastrarEmprestimos', 'description' => 'Cadastrar empréstimos']);
        Functionality::factory(1)->create(['id' => 14, 'name' =>'ListarEmprestimos', 'description' => 'Acessar listagem empréstimos']);
        Functionality::factory(1)->create(['id' => 15, 'name' =>'AcessarEmprestimo', 'description' => 'Acessar tela de informações de empréstimo cadastrado']);
        Functionality::factory(1)->create(['id' => 16, 'name' =>'CadastrarCargos', 'description' => 'Cadastrar cargos']);
        Functionality::factory(1)->create(['id' => 17, 'name' =>'ListarCargos', 'description' => 'Acessar listagem cargos']);
        Functionality::factory(1)->create(['id' => 18, 'name' =>'AcessarCargo', 'description' => 'Acessar tela de informações de cargo cadastrado']);
        Functionality::factory(1)->create(['id' => 19, 'name' =>'EditarRecursos', 'description' => 'Editar informações de recursos cadastrados']);
        Functionality::factory(1)->create(['id' => 20, 'name' =>'EditarEmpresas', 'description' => 'Editar informações de empresas cadastradas']);
        Functionality::factory(1)->create(['id' => 21, 'name' =>'EditarDepartamentos', 'description' => 'Editar informações de departamentos cadastrados']);
        Functionality::factory(1)->create(['id' => 22, 'name' =>'EditarEmprestimos', 'description' => 'Editar informações de empréstimos cadastrados']);
        Functionality::factory(1)->create(['id' => 23, 'name' =>'EditarCargos', 'description' => 'Editar informações de cargos cadastrados']);
        Functionality::factory(1)->create(['id' => 24, 'name' =>'EditarUsuarios', 'description' => 'Editar informações de usuários cadastrados']);

        
        $level = Level::find(1);
        $level->functionalities()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24]);
        $level = Level::find(2);
        $level->functionalities()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24]);
        $level = Level::find(3);
        $level->functionalities()->sync([2, 7, 8, 9, 15, 19]);
    }
}
