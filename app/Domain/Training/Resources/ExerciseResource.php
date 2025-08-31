<?php

namespace App\Domain\Training\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
{
    public function toArray($request)
    {
        $done = $this->done_sum ?? 0;
        $meta = $this->pivot->goal_total;
        return [
            'id'  => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'image_path' => $this->image_path,
            'feitos'    => $done,
            'meta'      => $meta,
            'concluido' => $done >= $meta,
        ];
    }
}
