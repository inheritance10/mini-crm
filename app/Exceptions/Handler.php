<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Oturum sırasında asla flash'lanmayacak alanlar (örneğin şifreler)
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Özel raporlama işlemleri buraya yazılabilir.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // Buraya Sentry, Bugsnag gibi servis entegrasyonları eklenebilir.
        });
    }

    /**
     * Kimlik doğrulaması olmayan istekler buradan döner.
     * Web uygulamalarında login sayfasına yönlendirirken,
     * API projelerinde JSON response ile 401 hatası döneriz.
     */
    /**
     * Unauthenticated hataları API için özel olarak JSON mesajıyla döner.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // Eğer istek bir JSON bekliyorsa (API isteği)
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Yetkisiz erişim. Lütfen giriş yapınız.',
            ], 401);
        }

        // Web uygulaması yönlendirmesi (biz kullanmıyoruz)
        return response()->json([
            'message' => 'Oturum gerekli. Lütfen giriş yapınız.',
        ], 401);
    }
    /**
     * Uygulama genelindeki tüm exception'ları burada özelleştirebiliriz.
     */
  public function render($request, Throwable $exception)
{

    if ($request->is('api/*')) {
        // 404 - Model bulunamadı
        if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
            return response()->json([
                'message' => 'Kayıt bulunamadı.'
            ], 404);
        }

        // 403 - Yetki yok
        if ($exception instanceof AuthorizationException) {
            return response()->json([
                'message' => 'Bu işlemi yapmaya yetkiniz yok.'
            ], 403);
        }

        // 422 - Doğrulama hatası
        if ($exception instanceof ValidationException) {
            return response()->json([
                'message' => 'Doğrulama hatası',
                'errors' => $exception->errors(),
            ], 422);
        }

        // 500 - Diğer hatalar
        return response()->json([
            'message' => 'Sunucu hatası',
            'error' => 'Beklenmeyen bir hata oluştu.'
        ], 500);
    }

    return parent::render($request, $exception);
}

}
