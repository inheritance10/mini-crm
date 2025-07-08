<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class AuthService
{
    protected AuthRepository $authRepository;

    //türrkçe yorum satırı ekle

    /**
     * AuthService sınıfı, kullanıcı kimlik doğrulama işlemlerini yönetir.
     *
     * @param AuthRepository $authRepository
     */
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * Yeni bir kullanıcı kaydı oluşturur.
     *
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    public function register(array $data): array
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $user = $this->authRepository->createUser($data);
        $token = JWTAuth::fromUser($user);

        return compact('user', 'token');
    }

    /**
     * Kullanıcı giriş işlemini gerçekleştirir.
     *
     * @param array $credentials
     * @return array
     * @throws \Exception
     */
    public function login(array $credentials): array
    {
        if (!$token = JWTAuth::attempt($credentials)) {
            throw new \Exception('Geçersiz giriş bilgileri', 401);
        }

        return compact('token');
    }

    /**
     * Giriş yapmış kullanıcının bilgilerini döner.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getMe()
    {
        return auth()->user();
    }

    /**
     * Kullanıcı çıkış işlemini gerçekleştirir.
     *
     * @return void
     */
    public function logout(): void
    {
        auth()->logout();
    }

    /**
     * Kullanıcının JWT token'ını yeniler.
     *
     * @return array
     */
    public function refresh(): array
    {
        return ['token' => auth()->refresh()];
    }
}
