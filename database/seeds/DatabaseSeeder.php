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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'servidor' => 'N',
            'admin' => 'S',
			'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'Servidor',
            'email' => 'servidor@mail.com',
            'servidor' => 'S',
            'admin' => 'N',
			'password' => Hash::make('123456'),
        ]);

        DB::table('alunos')->insert([
            'cod_aluno' => '1000',
            'nome_aluno' => 'Higor',
            'cpf' => '12345678901',
            'endereco' => 'estrada 1',
            'cep' => '65480001',
            'email_aluno' => 'higor@mail.com',
            'telefone' => '999999990',
            'nome_curso' => 'Administração',
        ]);
    }
}
