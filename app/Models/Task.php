<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TaskStatus;


class Task extends Model
{
    use HasFactory;

    /**
     * Model'in doldurulabilir alanlarını tanımlar.
     *
     * @var array
     */
    protected $fillable = ['employee_id', 'title', 'status'];

 
    protected $casts = [
        'status' => TaskStatus::class,
    ];

    /**
     * Belirli bir çalışana ait görevi döner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
