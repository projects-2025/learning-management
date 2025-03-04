<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('storage_public_url')) {
    /**
     * Generate a public URL for a stored file.
     *
     * @param string|null $filePath
     * @param string $disk
     * @return string
     */
    function storage_public_url(?string $filePath, $defaultPreview = "no-pictures.png", string $disk = 'public'): string
    {
        if (Storage::disk($disk)->exists($filePath)) {
            return Storage::disk($disk)->url($filePath);
        }

        return asset("assets/dashboard/defaults/{$defaultPreview}");
    }
}
