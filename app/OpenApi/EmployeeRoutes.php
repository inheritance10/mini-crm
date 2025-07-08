<?php

namespace App\OpenApi;

/**
 * @OA\Tag(
 *     name="Employee",
 *     description="Çalışan işlemleri"
 * )
 */
class EmployeeRoutes
{
    /**
     * @OA\Get(
     *     path="/api/employees",
     *     summary="Tüm çalışanları getir",
     *     tags={"Employee"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response=200, description="Başarılı", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Employee")))
     * )
     *
     * @OA\Post(
     *     path="/api/employees",
     *     summary="Yeni çalışan oluştur",
     *     tags={"Employee"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email"},
     *             @OA\Property(property="name", type="string", example="Ali Cebeci"),
     *             @OA\Property(property="email", type="string", example="ali@example.com")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Oluşturuldu", @OA\JsonContent(ref="#/components/schemas/Employee"))
     * )
     *
     * @OA\Get(
     *     path="/api/employees/{id}",
     *     summary="Tek çalışan getir",
     *     tags={"Employee"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Başarılı", @OA\JsonContent(ref="#/components/schemas/Employee"))
     * )
     *
     * @OA\Put(
     *     path="/api/employees/{id}",
     *     summary="Çalışanı güncelle",
     *     tags={"Employee"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Yeni İsim"),
     *             @OA\Property(property="email", type="string", example="yeni@example.com")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Güncellendi", @OA\JsonContent(ref="#/components/schemas/Employee"))
     * )
     *
     * @OA\Delete(
     *     path="/api/employees/{id}",
     *     summary="Çalışanı sil",
     *     tags={"Employee"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Silindi")
     * )
     */
    public function dummy() {}
}
