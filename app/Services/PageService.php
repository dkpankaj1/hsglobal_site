<?php

namespace App\Services;

use App\Models\Page;
use App\Support\DocumentHandler;
use App\Support\ImageHandler;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class PageService
{
    protected ImageHandler $imageHandler;
    protected DocumentHandler $documentHandler;

    public function __construct()
    {
        $this->imageHandler    = new ImageHandler('pages');
        $this->documentHandler = new DocumentHandler('pages');
    }

    // ── Slug generation ────────────────────────────────────────────

    /**
     * Generate a unique slug from the given name.
     */
    public function generateUniqueSlug(string $name, ?int $excludeId = null): string
    {
        $slug = Str::slug($name);

        $original = $slug;
        $counter  = 1;

        while (true) {
            $query = Page::where('slug', $slug);

            if ($excludeId !== null) {
                $query->where('id', '!=', $excludeId);
            }

            if (! $query->exists()) {
                break;
            }

            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }

    // ── CRUD ───────────────────────────────────────────────────────

    /**
     * Create a new page with optional image and file.
     */
    public function create(array $data): Page
    {
        $data['slug'] = $this->generateUniqueSlug($data['name']);

        $data['image'] = $this->uploadImage($data['image'] ?? null);
        $data['file']  = $this->uploadFile($data['file'] ?? null);

        $data['is_published'] = (bool) ($data['is_published'] ?? false);

        return Page::create($data);
    }

    /**
     * Update an existing page.
     */
    public function update(Page $page, array $data): Page
    {
        if (isset($data['name'])) {
            $data['slug'] = $this->generateUniqueSlug($data['name'], $page->id);
        }

        // Handle image: delete old if flag set, upload new if provided
        $data['image'] = $this->handleImageUpdate(
            $page->image,
            $data['image'] ?? null,
            (bool) ($data['delete_image'] ?? false)
        );

        // Handle file: delete old if flag set, upload new if provided
        $data['file'] = $this->handleFileUpdate(
            $page->file,
            $data['file'] ?? null,
            (bool) ($data['delete_file'] ?? false)
        );

        if (isset($data['is_published'])) {
            $data['is_published'] = (bool) $data['is_published'];
        }

        $page->update($data);

        return $page->fresh();
    }

    /**
     * Delete a page and its associated files from disk.
     */
    public function delete(Page $page): bool
    {
        if ($page->image) {
            $this->imageHandler->delete($page->image);
        }

        if ($page->file) {
            $this->documentHandler->delete($page->file);
        }

        return $page->delete();
    }

    // ── Image helpers ──────────────────────────────────────────────

    protected function uploadImage(?UploadedFile $file): ?string
    {
        if (! $file || ! $file->isValid()) {
            return null;
        }

        return $this->imageHandler->upload($file);
    }

    protected function handleImageUpdate(?string $existingPath, ?UploadedFile $newFile, bool $shouldDelete): ?string
    {
        // Delete old image if requested or if a new one is being uploaded
        if ($existingPath && ($shouldDelete || $newFile)) {
            $this->imageHandler->delete($existingPath);
            $existingPath = null;
        }

        // Upload new image if provided
        if ($newFile && $newFile->isValid()) {
            return $this->imageHandler->upload($newFile);
        }

        // If delete was requested and no new file, return null
        if ($shouldDelete) {
            return null;
        }

        // Otherwise keep existing
        return $existingPath;
    }

    // ── File helpers ───────────────────────────────────────────────

    protected function uploadFile(?UploadedFile $file): ?string
    {
        if (! $file || ! $file->isValid()) {
            return null;
        }

        return $this->documentHandler->upload($file);
    }

    protected function handleFileUpdate(?string $existingPath, ?UploadedFile $newFile, bool $shouldDelete): ?string
    {
        // Delete old file if requested or if a new one is being uploaded
        if ($existingPath && ($shouldDelete || $newFile)) {
            $this->documentHandler->delete($existingPath);
            $existingPath = null;
        }

        // Upload new file if provided
        if ($newFile && $newFile->isValid()) {
            return $this->documentHandler->upload($newFile);
        }

        // If delete was requested and no new file, return null
        if ($shouldDelete) {
            return null;
        }

        // Otherwise keep existing
        return $existingPath;
    }
}
