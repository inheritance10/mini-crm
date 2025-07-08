<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

   public function store(StoreTaskRequest $request): JsonResponse
{
    $task = $this->taskService->create($request->validated());
    return response()->json($task, 201);
}

public function update(UpdateTaskRequest $request, int $id): JsonResponse
{
    $task = $this->taskService->update($id, $request->validated());
    return response()->json($task);
}

    public function getTasks(int $employeeId): JsonResponse
    {
        $tasks = $this->taskService->getByEmployee($employeeId);
        return response()->json($tasks);
    }

    public function markComplete(int $id): JsonResponse
    {
        $task = $this->taskService->markComplete($id);
        return response()->json($task);
    }

}
