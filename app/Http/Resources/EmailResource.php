<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'email_address' => $this->email_address,
            'message' => $this->message,
            'attachment' => $this->attachment,
            'attachment_filename' => $this->attachment_filename,
            'status' => $this->status,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
