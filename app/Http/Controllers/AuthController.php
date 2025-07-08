<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    protected AuthService $authService;

    // AuthService sınıfını enjekte ediyoruz
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Kullanıcı kaydı için gerekli olan endpoint.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $result = $this->authService->register($request->validated());
        return response()->json($result, 201);
    }

    /**
     * Kullanıcı girişi için gerekli olan endpoint.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $result = $this->authService->login($request->validated());
        return response()->json($result);
    }

    /**
     * Giriş yapmış kullanıcının bilgilerini döner.
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json($this->authService->getMe());
    }


    /**
     * Kullanıcı çıkışı için gerekli olan endpoint.
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->authService->logout();
        return response()->json(['message' => 'Çıkış yapıldı']);
    }

    /**
     * Kullanıcının JWT token'ını yeniler.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return response()->json($this->authService->refresh());
    }
}
