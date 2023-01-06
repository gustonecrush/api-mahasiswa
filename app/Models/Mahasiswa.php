<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    public function programStudi() {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id');
    }
}
