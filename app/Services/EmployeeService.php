<?php
namespace App\Services;

use App\Repositories\EmployeeRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeService
{
    protected EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAll()
    {
        return $this->employeeRepository->all();
    }

    public function create(array $data)
    {
        return $this->employeeRepository->create($data);
    }

    public function getById($id)
    {
        return $this->employeeRepository->findOrFail($id);
    }

    public function update($id, array $data)
    {
        return $this->employeeRepository->update($id, $data);
    }

    public function delete($id)
    {
        $this->employeeRepository->delete($id);
    }
}
