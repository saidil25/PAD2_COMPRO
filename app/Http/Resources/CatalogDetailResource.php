<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CatalogDetailResource extends JsonResource
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
            'title' => $this->title,
            'image' => $this->image,
            'description' => $this->description,
            'created_at' => Carbon::parse($this->created_at) -> format('Y-m-d'),
            'author_id' => $this->author_id,
            'author' => $this->whenLoaded('author'),
            'category_id' => $this->category_id,
            'category' => $this->whenLoaded('category'),
        ];
    }
}
