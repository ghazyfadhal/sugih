<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

/**
 * Thin wrapper around Supabase REST API (Auth, Storage, PostgREST).
 * Use service-role key only on trusted backend operations.
 */
class SupabaseClient
{
    protected Client $http;

    public function __construct(
        protected string $url,
        protected string $anonKey,
        protected string $serviceRoleKey,
        protected int    $timeout = 15,
    ) {
        $this->http = new Client([
            'base_uri' => rtrim($this->url, '/').'/',
            'timeout'  => $this->timeout,
        ]);
    }

    public function url(): string
    {
        return $this->url;
    }

    public function anonKey(): string
    {
        return $this->anonKey;
    }

    public function serviceRoleKey(): string
    {
        return $this->serviceRoleKey;
    }

    /**
     * Generic JSON request to a Supabase endpoint.
     *
     * @param  array<string, mixed>  $options
     * @return array<string, mixed>
     */
    public function request(string $method, string $path, array $options = [], bool $useServiceRole = false): array
    {
        $key = $useServiceRole ? $this->serviceRoleKey : $this->anonKey;

        $options['headers'] = array_merge([
            'apikey'        => $key,
            'Authorization' => 'Bearer '.$key,
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ], $options['headers'] ?? []);

        try {
            $response = $this->http->request($method, ltrim($path, '/'), $options);
            $body = (string) $response->getBody();

            return [
                'status' => $response->getStatusCode(),
                'data'   => $body === '' ? null : json_decode($body, true),
            ];
        } catch (GuzzleException $e) {
            Log::error('[Supabase] Request failed', [
                'method'  => $method,
                'path'    => $path,
                'message' => $e->getMessage(),
            ]);

            return [
                'status' => $e->getCode() ?: 500,
                'error'  => $e->getMessage(),
            ];
        }
    }
}
