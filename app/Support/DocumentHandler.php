<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class DocumentHandler
{
    protected string $folder;
    protected string $folderName;

    public function __construct(string $folderName)
    {
        $this->folderName = $folderName;
        $this->folder = public_path('upload/' . $folderName);
    }

    /**
     * Upload a document file and return the relative path.
     */
    public function upload(UploadedFile $file): ?string
    {
        if (! $file->isValid()) {
            return null;
        }

        try {
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

            $file->move($this->folder, $filename);

            return 'upload/' . $this->folderName . '/' . $filename;
        } catch (\Exception) {
            return null;
        }
    }

    /**
     * Delete a document file from storage.
     */
    public function delete(?string $path): bool
    {
        if (empty($path)) {
            return false;
        }

        $fullPath = public_path('upload/' . $path);

        return file_exists($fullPath) && unlink($fullPath);
    }
}
