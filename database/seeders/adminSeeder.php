<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
		    "first_name"    => "Password Manager",
		    "last_name"     => "Admin",
		    "email_id"      => "kotasairithika@gmail.com",
		    "phone_no"      => "9407582070",
		    "country_code"  => "1",
		    "username"      => "admin",
		    "password"      => bcrypt("sai123"),
		    "admin" 		=> 1
        ]);
    }
}
