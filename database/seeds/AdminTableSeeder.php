<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Admin::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('123456'),
        ]);
    }
}
