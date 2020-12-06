<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'       => 'Marina Melo',
            'email'      => 'ninadsm29@gmail.com',
            'password'   => bcrypt('vaidarcerto'),
            'created_at' => date('d/m/Y'),
            'updated_at' => date('d/m/Y'),
            ]);
    }
}
