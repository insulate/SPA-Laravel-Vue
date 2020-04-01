<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'slug' => $this->path,
            'body' => $this->body,
            'crated_at' => $this->created_at->diffForHumans(),
            'user' => $this->user->name
        ];
    }
}
