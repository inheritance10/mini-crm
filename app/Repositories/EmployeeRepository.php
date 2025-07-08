<?php
namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeRepository
{
    public function all()
    {
        return Employee::all();
    }

    public function create(array $data)
    {
        return Employee::create($data);
    }

    public function findOrFail($id)
    {
        return Employee::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        return $employee;
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
    }
}
