<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUploadTrait
{
    function uploadImage(Request $request, string $inputName, ?string $oldPath = null, string $path = '/uploads'): ?string
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            // Delete previous image if exists
            $excludedFolder = '/default';

            if ($oldPath && file_exists(public_path($oldPath)) && strpos($oldPath, $excludedFolder) !== 0) {
                unlink(public_path($oldPath));
            }
            return $path . '/' . $imageName;
        }

        return null;
    }
}
