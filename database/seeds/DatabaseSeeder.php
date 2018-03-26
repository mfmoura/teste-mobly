<?php

use Illuminate\Database\Seeder;
use Mobly\User;

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

        $Admin = new User;

        $Admin->name = "Admin";
        $Admin->email = "admin@admin.com";
        $Admin->password = bcrypt("admin123");
        $Admin->level = '1';

        $Admin->save();

        $User = new User;

        $User->name = "User";
        $User->email = "user@user.com";
        $User->password = bcrypt("user123");
        $User->level = '0';

        $User->save();
    }
}
