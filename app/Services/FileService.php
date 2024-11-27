<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public function saveBase64File(string $base64Content, string $filename): ?string
    {
        $decodedContent = base64_decode($base64Content);
        $filePath = 'attachments/' . $filename;
        Storage::disk('public')->put($filePath, $decodedContent);

        return $filePath;
    }

}
