<?php
namespace App\Services;

use App\Repositories\EmployeeRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeService
{
    protected EmployeeRepository $employeeRepository;

    /**
     * EmployeeService constructor.
     *
     * @param EmployeeRepository $employeeRepository
     */
    // EmployeeRepository sınıfını enjekte ediyoruz
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Tüm çalışanları döner.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->employeeRepository->all();
    }

    /**
     * Yeni bir çalışan kaydı oluşturur.
     *
     * @param array $data
     * @return \App\Models\Employee
     */
    public function create(array $data)
    {
        return $this->employeeRepository->create($data);
    }

    /**
     * Belirli bir çalışanın bilgilerini döner.
     *
     * @param int $id
     * @return \App\Models\Employee
     * @throws ModelNotFoundException
     */
    public function getById($id)
    {
        return $this->employeeRepository->findOrFail($id);
    }

    /**
     * Belirli bir çalışanın bilgilerini günceller.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Employee
     */
    public function update($id, array $data)
    {
        return $this->employeeRepository->update($id, $data);
    }

    /**
     * Belirli bir çalışanın görevlerini döner.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function delete($id)
    {
        $this->employeeRepository->delete($id);
    }
}
