<?php
namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeRepository
{

    /*
        * EmployeeRepository sınıfı, çalışanlarla ilgili veritabanı işlemlerini yönetir.
        * Bu sınıf, çalışanları oluşturma, güncelleme, silme ve listeleme gibi işlemleri içerir.
        */

    /**
     * Tüm çalışanları getirir.
     * @return \Illuminate\Database\Eloquent\Collection|Employee[]
     */ 
    public function all()
    {
        return Employee::all();
    }

 

    /**
     * Yeni bir çalışan kaydı oluşturur.
     *
     * @param array $data
     * @return Employee
     */
    public function create(array $data)
    {
        return Employee::create($data);
    }


    /**
     * Belirli bir çalışanın bilgilerini getirir.
     *
     * @param int $id
     * @return Employee
     * @throws ModelNotFoundException
     */
    public function findOrFail($id)
    {
        return Employee::findOrFail($id);
    }

    /**
     * Belirli bir çalışanın bilgilerini günceller.
     *
     * @param int $id
     * @param array $data
     * @return Employee
     */
    public function update($id, array $data)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        return $employee;
    }

    /**
     * Belirli bir çalışanın görevlerini getirir.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
    }
}
