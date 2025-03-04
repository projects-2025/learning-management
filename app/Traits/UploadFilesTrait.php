<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadFilesTrait
{

    public function uploadImage(?UploadedFile $file, string $directory = 'uploads', string $disk = 'public'): ?string
    {
        try {
            if (!$file) {
                return null;
            }
            // Generate a unique filename
            $filename = $this->generateHashedFilename($file);

            // store in storage
            $file->storeAs($directory, $filename, $disk);

            $fullPath = $directory . '/' . $filename;

            return $fullPath;
        } catch (Exception $e) {
            throw new Exception('File upload failed: ' . $e->getMessage());
        }
    }

    /**
     * Upload a file to the specified directory and disk.
     *
     * @param UploadedFile $file
     * @param string $dir
     * @param string|null $disk (default: 'public')
     * @return string|null
     */
    public function uploadFile(?UploadedFile $file, string $directory = 'uploads', string $disk = 'public'): ?string
    {
        try {
            if (!$file) {
                return null;
            }
            // Generate a unique filename
            $filename = $this->generateHashedFilename($file);

            // store in storage
            $file->storeAs($directory, $filename, $disk);

            $fullPath = $directory . '/' . $filename;

            return $fullPath;
        } catch (Exception $e) {
            throw new Exception('File upload failed: ' . $e->getMessage());
        }
    }

    /**
     * Delete a file from the specified directory and disk.
     *
     * @param string $filePath
     * @param string|null $disk (default: 'public')
     * @return bool
     */
    public function deleteFile(string $filePath, string $disk = 'public'): bool
    {
        return Storage::disk($disk)->exists($filePath) ? Storage::disk($disk)->delete($filePath) : false;
    }


    protected function generateHashedFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $hash = Str::random(40);
        return $hash . '.' . $extension;
    }
}
