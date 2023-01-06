<?php

namespace App\Http\Resources;

use App\Models\ProgramStudi;
use Illuminate\Http\Resources\Json\JsonResource;

class FakultasResource extends JsonResource
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
            'id' => $this->id,
            'fakultas' => $this->fakultas,
            'program_studi' => ProgramStudiResource::collection($this->prodis),
        ];
    }
}
