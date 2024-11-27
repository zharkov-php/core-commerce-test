<?php

namespace App\Repositories;

use App\EmailStatus;
use App\Models\Email;
use Illuminate\Database\Eloquent\Collection;

class EmailRepository
{
    public function getAll(): Collection
    {
        return Email::all();
    }

    public function create(array $data)
    {
        return Email::create([
            'email_address' => $data['email_address'],
            'message' => $data['message'],
            'attachment' => $data['attachment'] ?? null,
            'attachment_filename' => $data['attachment_filename'] ?? null,
            'status' => EmailStatus::PENDING,
        ]);
    }

}
