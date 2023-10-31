<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomepageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'occupation' => $this->occupation,
            'first_text' => $this->first_text,
            'second_text' => $this->second_text,
            'text_footer' => $this->text_footer,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
