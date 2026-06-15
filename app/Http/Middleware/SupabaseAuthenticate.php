<?php

namespace App\Http\Middleware;

use App\Services\SupabaseAuthService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware untuk memvalidasi JWT Supabase pada request masuk.
 * Aktifkan dengan menambahkannya ke alias di bootstrap/app.php
 * lalu pasang ke route (mis. panel admin).
 */
class SupabaseAuthenticate
{
    public function __construct(protected SupabaseAuthService $auth) {}

    public function handle(Request $request, Closure $next): Response
    {
        $token = $this->extractToken($request);

        if (! $token) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $result = $this->auth->getUser($token);

        if (($result['status'] ?? 0) !== 200 || empty($result['data'])) {
            return response()->json(['message' => 'Invalid token.'], 401);
        }

        $request->attributes->set('supabase_user', $result['data']);

        return $next($request);
    }

    private function extractToken(Request $request): ?string
    {
        $header = $request->header('Authorization', '');
        if (is_string($header) && str_starts_with($header, 'Bearer ')) {
            return substr($header, 7);
        }

        return $request->cookie('sb-access-token');
    }
}
