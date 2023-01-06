<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            "nama" => "Farhan Agustiansyah",
            "email" => "augusf24@gmail.com",
            "NIM" => "09031282025102",
            "jenis_kelamin" => "Pria",
            "angkatan" => 2020,
            "semester" => 6,
            "fakultas_id" => 1,
            "prodi_id" => 1,
        ]);

        Mahasiswa::create([
            "nama" => "Muhammad Fajrul Azhim",
            "email" => "fajrul@gmail.com",
            "NIM" => "09031282025103",
            "jenis_kelamin" => "Pria",
            "angkatan" => 2020,
            "semester" => 6,
            "fakultas_id" => 2,
            "prodi_id" => 3,
        ]);

        Mahasiswa::create([
            "nama" => "Muhammad Daffa Nizar Bahari",
            "email" => "daffa@gmail.com",
            "NIM" => "09031282025101",
            "jenis_kelamin" => "Pria",
            "angkatan" => 2020,
            "semester" => 6,
            "fakultas_id" => 3,
            "prodi_id" => 4,
        ]);
    }
}
