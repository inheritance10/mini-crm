<?php
namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected TaskRepository $taskRepository;

    /**
     * TaskService constructor.
     *
     * @param TaskRepository $taskRepository
     */
    // TaskRepository sınıfını enjekte ediyoruz
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Tüm görevleri döner.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function create(array $data)
    {
        return $this->taskRepository->create($data);
    }

    /**
     * Belirli bir görevi günceller.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Task
     */
    public function update(int $id, array $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    /**
     * Belirli bir görevi döner.
     *
     * @param int $id
     * @return \App\Models\Task
     */
    public function getByEmployee(int $employeeId)
    {
        return $this->taskRepository->getByEmployeeId($employeeId);
    }

    /**
     * Belirli bir görevi tamamlanmış olarak işaretler.
     *
     * @param int $id
     * @return \App\Models\Task
     */
    public function markComplete(int $id)
    {
        return $this->taskRepository->markComplete($id);
    }
}
