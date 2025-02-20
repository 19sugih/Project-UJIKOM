<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{   
    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = ['name'];

    // Menentukan kolom yang tidak boleh diisi secara massal
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    // Relasi satu ke banyak (TaskList memiliki banyak Task)
    // Menunjukkan bahwa satu TaskList bisa memiliki banyak Task
    public function tasks()   {
        return $this->hasMany(Task::class, 'list_id'); // TaskList memiliki banyak Task yang dikaitkan dengan 'list_id'
    } 
}