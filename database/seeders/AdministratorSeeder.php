<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table("users")->truncate();

        $administrator = new \App\Models\User;
       
        $administrator->name = "Administrator";
        $administrator->email = "administrator@larashop.test";
        $administrator->role = "admin";
        $administrator->password = \Hash::make("larashop");
        $administrator->instansi_id = 1;

        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}
