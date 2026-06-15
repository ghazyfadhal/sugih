<?php

namespace App\Services;

/**
 * Wrapper untuk Supabase Auth (GoTrue) endpoints.
 *
 * Method-method ini adalah skeleton — implementasi penuh dilakukan
 * saat fitur autentikasi diaktifkan (admin login, dsb).
 */
class SupabaseAuthService
{
    public function __construct(protected SupabaseClient $client) {}

    /**
     * Sign up user baru.
     *
     * @return array<string, mixed>
     */
    public function signUp(string $email, string $password, array $metadata = []): array
    {
        return $this->client->request('POST', 'auth/v1/signup', [
            'json' => [
                'email'    => $email,
                'password' => $password,
                'data'     => $metadata,
            ],
        ]);
    }

    /**
     * Sign in dengan password.
     *
     * @return array<string, mixed>
     */
    public function signInWithPassword(string $email, string $password): array
    {
        return $this->client->request('POST', 'auth/v1/token?grant_type=password', [
            'json' => [
                'email'    => $email,
                'password' => $password,
            ],
        ]);
    }

    /**
     * Verifikasi JWT token user (dipanggil dari middleware).
     *
     * @return array<string, mixed>
     */
    public function getUser(string $accessToken): array
    {
        return $this->client->request('GET', 'auth/v1/user', [
            'headers' => [
                'Authorization' => 'Bearer '.$accessToken,
            ],
        ]);
    }

    public function signOut(string $accessToken): array
    {
        return $this->client->request('POST', 'auth/v1/logout', [
            'headers' => [
                'Authorization' => 'Bearer '.$accessToken,
            ],
        ]);
    }
}
