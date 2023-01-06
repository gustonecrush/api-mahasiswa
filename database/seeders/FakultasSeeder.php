<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fakultas::create([
            "fakultas" => "Ilmu Komputer"
        ]);

        Fakultas::create([
            "fakultas" => "Teknik"
        ]);

        Fakultas::create([
            "fakultas" => "Kedokteran"
        ]);

        Fakultas::create([
            "fakultas" => "Matematika & Ilmu Pengetahuan Alam"
        ]);
    }
}
