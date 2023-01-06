<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProgramStudi::create([
            "program_studi" => "Sistem Informasi",
            "fakultas_id" => 1,
        ]);

        ProgramStudi::create([
            "program_studi" => "Teknik Informatika",
            "fakultas_id" => 1,
        ]);

        ProgramStudi::create([
            "program_studi" => "Teknik Elektro",
            "fakultas_id" => 2,
        ]);

        ProgramStudi::create([
            "program_studi" => "Kedokteran",
            "fakultas_id" => 3,
        ]);

        ProgramStudi::create([
            "program_studi" => "Aktuaria",
            "fakultas_id" => 4,
        ]);
    }
}
