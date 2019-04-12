<?php

use Illuminate\Database\Seeder;
use App\Master;
use App\User;
use App\Contributor;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeding the users table only with the master user.
        User::create([
            'name' => 'Usuário master',
            'email' => 'master@mail.com',
            'password' => bcrypt('123456'),
            'userable_id' => '1',
            'userable_type' => App\Master::class
        ]);
        
        Contributor::create([
            'cpf' => '04981712308',
            'pis' => '12345599912',
            'position' => 'Assistente',
            'team' => 'Geral',
        ]);

        User::create([
            'name' => 'Joao da Silva',
            'email' => 'joao@mail.com',
            'password' => bcrypt('123456'),
            'userable_id' => '1',
            'userable_type' => App\Contributor::class
        ]);
    }
}
