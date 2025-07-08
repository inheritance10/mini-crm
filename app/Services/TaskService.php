<?php
namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function create(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    public function getByEmployee(int $employeeId)
    {
        return $this->taskRepository->getByEmployeeId($employeeId);
    }

    public function markComplete(int $id)
    {
        return $this->taskRepository->markComplete($id);
    }
}
