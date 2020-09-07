<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //ADMIN

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'servidor' => 'N',
            'admin' => 'S',
			'password' => Hash::make('123456'),
        ]);

        //SERVIDOR

        DB::table('users')->insert([
            'name' => 'Servidor',
            'email' => 'servidor@mail.com',
            'servidor' => 'S',
            'admin' => 'N',
			'password' => Hash::make('123456'),
        ]);

        //CURSOS

        // DB::table('cursos')->insert([
        //     'codigo' => '101010',
        //     'nome' => 'Administração',
        //     'data_cadastro' => '15/02/2020',
        //     'carga_horaria' => '4000 horas',
        // ]);

        // DB::table('cursos')->insert([
        //     'codigo' => '202020',
        //     'nome' => 'Direito',
        //     'data_cadastro' => '17/04/2020',
        //     'carga_horaria' => '5000 horas',
        // ]);

        // DB::table('cursos')->insert([
        //     'codigo' => '303030',
        //     'nome' => 'Medicina',
        //     'data_cadastro' => '12/01/2020',
        //     'carga_horaria' => '6500 horas',
        // ]);

        //ALUNOS

        // DB::table('alunos')->insert([
        //     'cod_aluno' => '1000',
        //     'nome_aluno' => 'Higor',
        //     'cpf' => '12345678901',
        //     'endereco' => 'estrada 1',
        //     'cep' => '65480001',
        //     'email_aluno' => 'higor@mail.com',
        //     'telefone' => '999999991',
        //     'nome_curso' => 'Administração',
        // ]);

        // DB::table('alunos')->insert([
        //     'cod_aluno' => '2000',
        //     'nome_aluno' => 'Gabriel',
        //     'cpf' => '12345678902',
        //     'endereco' => 'estrada 2',
        //     'cep' => '65480002',
        //     'email_aluno' => 'gabriel@mail.com',
        //     'telefone' => '999999992',
        //     'nome_curso' => 'Administração',
        // ]);

        // DB::table('alunos')->insert([
        //     'cod_aluno' => '3000',
        //     'nome_aluno' => 'Laura',
        //     'cpf' => '12345678903',
        //     'endereco' => 'estrada 3',
        //     'cep' => '65480003',
        //     'email_aluno' => 'laura@mail.com',
        //     'telefone' => '999999993',
        //     'nome_curso' => 'Direito',
        // ]);

        // DB::table('alunos')->insert([
        //     'cod_aluno' => '4000',
        //     'nome_aluno' => 'Raul',
        //     'cpf' => '1245678904',
        //     'endereco' => 'estrada 4',
        //     'cep' => '65480004',
        //     'email_aluno' => 'raul@mail.com',
        //     'telefone' => '999999994',
        //     'nome_curso' => 'Direito',
        // ]);

        // DB::table('alunos')->insert([
        //     'cod_aluno' => '5000',
        //     'nome_aluno' => 'Ana',
        //     'cpf' => '1245678905',
        //     'endereco' => 'estrada 5',
        //     'cep' => '65480005',
        //     'email_aluno' => 'ana@mail.com',
        //     'telefone' => '999999995',
        //     'nome_curso' => 'Medicina',
        // ]);

        // DB::table('alunos')->insert([
        //     'cod_aluno' => '6000',
        //     'nome_aluno' => 'Vitor',
        //     'cpf' => '1245678906',
        //     'endereco' => 'estrada 6',
        //     'cep' => '65480006',
        //     'email_aluno' => 'vitor@mail.com',
        //     'telefone' => '999999996',
        //     'nome_curso' => 'Medicina',
        // ]);

        // DB::table('alunos')->insert([
        //     'cod_aluno' => '7000',
        //     'nome_aluno' => 'Clara',
        //     'cpf' => '1245678907',
        //     'endereco' => 'estrada 7',
        //     'cep' => '65480007',
        //     'email_aluno' => 'clara@mail.com',
        //     'telefone' => '999999997',
        //     'nome_curso' => 'Medicina',
        // ]);
    }
}
