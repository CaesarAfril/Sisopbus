<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class AdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_admin')->insert([
            'username' => 'admin',
            'nama' => 'admin',
            'email' => 'adm@gmail.com',
            'foto' => 'default.png',
            'password' => Hash::make('admin'),
            'UQ' => '7097',
        ]);
    }
}
