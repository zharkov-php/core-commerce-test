<?php

namespace App\Models;

use App\EmailStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [
        'email_address',
        'message',
        'attachment',
        'attachment_filename',
        'status',
    ];

    protected $casts = [
        'status' => EmailStatus::class,
    ];
}
