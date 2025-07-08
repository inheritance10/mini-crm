<?php
namespace App\Repositories;

use App\Models\Task;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskRepository
{
    // Bu metod, Task modelinden yeni bir görev oluşturur
    public function create(array $data)
    {
        return Task::create($data);
    }

    // Bu metod, Task modelinden tüm görevleri getirir
    public function update(int $id, array $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    // Bu metod, Task modelinden belirli bir ID'ye sahip görevi bulur
    public function findOrFail(int $id)
    {
        return Task::findOrFail($id);
    }

    // Bu metod, belirli bir çalışana ait görevleri getirir
    public function getByEmployeeId(int $employeeId)
    {
     
    Employee::findOrFail($employeeId);

    
    return Task::where('employee_id', $employeeId)->get();
    }

    // Bu metod, belirli bir ID'ye sahip görevi tamamlanmış olarak işaretler
    // ve güncellenmiş görevi döner
    public function markComplete(int $id)
    {
        $task = Task::findOrFail($id);
        $task->update(['status' => 'completed']);
        return $task;
    }
}
