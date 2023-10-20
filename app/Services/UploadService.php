<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{

    public function upload(UploadedFile $file, $directory = 'uploads', $disk = 'public', $filename = null)
    {
        if (!$file->isValid()) {
            return false;
        }

        $filename = $filename ?: $this->generateUniqueFilename($file);

        $path = $file->storeAs($directory, $filename, $disk);

        return $path;
    }

    protected function generateUniqueFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $uniqueId = uniqid();
        $newFilename = "{$filename}_{$uniqueId}.{$extension}";

        return $newFilename;
    }
}
