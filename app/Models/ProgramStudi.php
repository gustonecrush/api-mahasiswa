<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'prodi_id');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
