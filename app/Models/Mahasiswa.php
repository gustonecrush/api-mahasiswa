<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kelas() {
        return $this->belongsTo('kelas', 'kelas_id');
    }

    public function programStudi() {
        return $this->belongsTo('program_studis', 'prodi_id');
    }
}
