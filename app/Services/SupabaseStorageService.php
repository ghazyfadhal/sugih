<?php

namespace App\Services;

/**
 * Wrapper untuk Supabase Storage (S3-compatible).
 * Skeleton — upload/list/delete diaktifkan saat panel admin dibuat.
 */
class SupabaseStorageService
{
    public function __construct(
        protected SupabaseClient $client,
        protected string $bucket,
    ) {}

    public function bucket(): string
    {
        return $this->bucket;
    }

    /**
     * Get public URL untuk sebuah objek di bucket publik.
     */
    public function publicUrl(string $path): string
    {
        return rtrim($this->client->url(), '/')
            ."/storage/v1/object/public/{$this->bucket}/".ltrim($path, '/');
    }

    /**
     * Upload file ke storage (gunakan service role key).
     *
     * @return array<string, mixed>
     */
    public function upload(string $path, string $contents, string $mimeType = 'application/octet-stream'): array
    {
        return $this->client->request(
            'POST',
            "storage/v1/object/{$this->bucket}/".ltrim($path, '/'),
            [
                'headers' => [
                    'Content-Type' => $mimeType,
                    'x-upsert'     => 'true',
                ],
                'body' => $contents,
            ],
            useServiceRole: true,
        );
    }

    public function delete(string $path): array
    {
        return $this->client->request(
            'DELETE',
            "storage/v1/object/{$this->bucket}/".ltrim($path, '/'),
            [],
            useServiceRole: true,
        );
    }
}
