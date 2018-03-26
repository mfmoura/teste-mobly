<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
              ['name'=>'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt("admin123"), 'level' => '1'],
              ['name'=>'User', 'email' => 'user@user.com', 'password' => bcrypt("user123"), 'level' => '0']
            ]
        );

        DB::table('categorias')->insert([
              ['nome'=>'Categoria 1'],
              ['nome'=>'Categoria 2'],
              ['nome'=>'Categoria 3'],
              ['nome'=>'Categoria 4'],
              ['nome'=>'Categoria 5'],
              ['nome'=>'Categoria 6']
            ]
        );
    }
}
