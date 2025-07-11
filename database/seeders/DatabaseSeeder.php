<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\EconomicGroup;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar usuário administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@ecogroup.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        // Criar grupos econômicos
        $grupo1 = EconomicGroup::create(['name' => 'Grupo ABC']);
        $grupo2 = EconomicGroup::create(['name' => 'Grupo XYZ']);
        $grupo3 = EconomicGroup::create(['name' => 'Grupo 123']);

        // Criar marcas
        $marca1 = Brand::create([
            'name' => 'Marca Alpha',
            'economic_group_id' => $grupo1->id
        ]);
        
        $marca2 = Brand::create([
            'name' => 'Marca Beta',
            'economic_group_id' => $grupo1->id
        ]);
        
        $marca3 = Brand::create([
            'name' => 'Marca Gamma',
            'economic_group_id' => $grupo2->id
        ]);
        
        $marca4 = Brand::create([
            'name' => 'Marca Delta',
            'economic_group_id' => $grupo3->id
        ]);

        // Criar unidades
        $unidade1 = Unit::create([
            'fantasy_name' => 'Unidade Central',
            'corporate_name' => 'Empresa Central Ltda',
            'cnpj' => '11.222.333/0001-44',
            'brand_id' => $marca1->id
        ]);
        
        $unidade2 = Unit::create([
            'fantasy_name' => 'Unidade Norte',
            'corporate_name' => 'Empresa Norte Ltda',
            'cnpj' => '22.333.444/0001-55',
            'brand_id' => $marca1->id
        ]);
        
        $unidade3 = Unit::create([
            'fantasy_name' => 'Unidade Sul',
            'corporate_name' => 'Empresa Sul Ltda',
            'cnpj' => '33.444.555/0001-66',
            'brand_id' => $marca2->id
        ]);
        
        $unidade4 = Unit::create([
            'fantasy_name' => 'Unidade Leste',
            'corporate_name' => 'Empresa Leste Ltda',
            'cnpj' => '44.555.666/0001-77',
            'brand_id' => $marca3->id
        ]);
        
        $unidade5 = Unit::create([
            'fantasy_name' => 'Unidade Oeste',
            'corporate_name' => 'Empresa Oeste Ltda',
            'cnpj' => '55.666.777/0001-88',
            'brand_id' => $marca4->id
        ]);

        // Criar funcionários
        Employee::create([
            'name' => 'João Silva',
            'email' => 'joao.silva@empresa.com',
            'cpf' => '123.456.789-01',
            'unit_id' => $unidade1->id
        ]);
        
        Employee::create([
            'name' => 'Maria Santos',
            'email' => 'maria.santos@empresa.com',
            'cpf' => '234.567.890-12',
            'unit_id' => $unidade1->id
        ]);
        
        Employee::create([
            'name' => 'Pedro Oliveira',
            'email' => 'pedro.oliveira@empresa.com',
            'cpf' => '345.678.901-23',
            'unit_id' => $unidade2->id
        ]);
        
        Employee::create([
            'name' => 'Ana Costa',
            'email' => 'ana.costa@empresa.com',
            'cpf' => '456.789.012-34',
            'unit_id' => $unidade2->id
        ]);
        
        Employee::create([
            'name' => 'Carlos Ferreira',
            'email' => 'carlos.ferreira@empresa.com',
            'cpf' => '567.890.123-45',
            'unit_id' => $unidade3->id
        ]);
        
        Employee::create([
            'name' => 'Lucia Pereira',
            'email' => 'lucia.pereira@empresa.com',
            'cpf' => '678.901.234-56',
            'unit_id' => $unidade4->id
        ]);
        
        Employee::create([
            'name' => 'Roberto Lima',
            'email' => 'roberto.lima@empresa.com',
            'cpf' => '789.012.345-67',
            'unit_id' => $unidade5->id
        ]);
        
        Employee::create([
            'name' => 'Fernanda Rocha',
            'email' => 'fernanda.rocha@empresa.com',
            'cpf' => '890.123.456-78',
            'unit_id' => $unidade5->id
        ]);
    }
}
