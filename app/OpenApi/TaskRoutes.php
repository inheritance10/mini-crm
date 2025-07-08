<?php

namespace App\OpenApi;

/**
 * @OA\Tag(
 *     name="Task",
 *     description="Görev işlemleri"
 * )
 */
class TaskRoutes
{
    /**
     * @OA\Post(
     *     path="/api/tasks",
     *     summary="Görev oluştur",
     *     tags={"Task"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"employee_id", "title", "status"},
     *             @OA\Property(property="employee_id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Müşteri araması"),
     *             @OA\Property(property="status", type="string", example="pending")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Başarılı", @OA\JsonContent(ref="#/components/schemas/Task"))
     * )
     *
     * @OA\Put(
     *     path="/api/tasks/{id}",
     *     summary="Görevi güncelle",
     *     tags={"Task"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Yeni görev"),
     *             @OA\Property(property="status", type="string", example="in_progress")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Güncellendi", @OA\JsonContent(ref="#/components/schemas/Task"))
     * )
     *
     * @OA\Get(
     *     path="/api/employees/{employeeId}/tasks",
     *     summary="Çalışanın görevlerini getir",
     *     tags={"Task"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="employeeId", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Başarılı", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Task")))
     * )
     *
     * @OA\Patch(
     *     path="/api/tasks/{id}/complete",
     *     summary="Görevi completed yap",
     *     tags={"Task"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Tamamlandı", @OA\JsonContent(ref="#/components/schemas/Task"))
     * )
     */
    public function dummy() {}
}
