<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TaskStatus;


class Task extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'title', 'status'];

    protected $casts = [
        'status' => TaskStatus::class,
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
