<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "name" => "Farhan Augustiansyah",
            "email" => "test@icloud.com",
            "password" => bcrypt("1234Zxx5678"),
        ]);

        $this->call(ProgramStudiSeeder::class);
        $this->call(FakultasSeeder::class);
        $this->call(MahasiswaSeeder::class);
    }
}
