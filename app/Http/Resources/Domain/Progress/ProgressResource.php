<?php

namespace App\Domain\Progress\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgressResource extends JsonResource
{
    public function toArray($request)
    {
        $first = $this->sortBy('started_at')->first();
        $exercise = $first->exercise;

        return [
            'id'          => $exercise->id,
            'nome'        => $exercise->name,
            'series'      => $first->notes['series'] ?? '',
            'cargaInicial'=> $first->notes['carga_inicial'] ?? '',
            'iniciadoEm'  => optional($first->started_at)->format('d/m/Y'),
            'feitos'      => $this->sum('done'),
            'meta'        => $first->notes['meta'] ?? 0,
        ];
    }
}
