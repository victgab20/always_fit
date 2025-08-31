<?php

namespace App\Domain\Training\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' =>  $this->title,
            'level' => $this->level,
            'is_active' => $this->is_active,
            'exercises' => ExerciseResource::collection($this->exercises),
        ];
    }
}
