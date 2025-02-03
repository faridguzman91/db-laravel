<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'year' => $this->year,
            'category' => $this->category,
            'materials' => $this->materials, // This is already cast to an array
            'image' => asset('/storage/' . $this->image),
            'project_url' => $this->project_url,
        ];
    }
}
