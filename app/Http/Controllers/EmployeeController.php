<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;


class EmployeeController extends Controller
{
    protected EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->employeeService->getAll());
    }

   public function store(StoreEmployeeRequest $request): JsonResponse
{
    $employee = $this->employeeService->create($request->validated());
    return response()->json($employee, 201);
}

public function update(UpdateEmployeeRequest $request, string $id): JsonResponse
{
    $employee = $this->employeeService->update($id, $request->validated());
    return response()->json($employee);
}
    public function show(string $id): JsonResponse
    {
        $employee = $this->employeeService->getById($id);

        return response()->json($employee);
    }

   

    public function destroy(string $id): JsonResponse
    {
        $this->employeeService->delete($id);

        return response()->json(['message' => 'Çalışan silindi.']);
    }
}
