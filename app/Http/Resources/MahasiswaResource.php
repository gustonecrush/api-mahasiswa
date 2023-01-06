<?php

namespace App\Http\Resources;

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
            "kelas" => KelasResource::collection($this->kelas_id),
            "prodi" => ProgramStudiResource::collection($this->program_studi),
            "created_at" => $this->createdAt,
            "updated_at" => $this->updatedAt
        ];
    }
}
