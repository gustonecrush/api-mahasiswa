<?php

namespace App\Http\Resources;

use App\Models\Kelas;
use App\Models\ProgramStudi;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "nama" => $this->nama,
            "email" => $this->email,
            "NIM" => $this->NIM,
            "jenis_kelamin" => $this->jenis_kelamin,
            "semester" => $this->semester,
            "angkatan" => $this->angkatan,
            "kelas" => KelasResource::collection(Kelas::where('id', '=', $this->kelas_id)->get()),
            "prodi" => ProgramStudiResource::collection(ProgramStudi::where('id', '=', $this->prodi_id)->get()),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
