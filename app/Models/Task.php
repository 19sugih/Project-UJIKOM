<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model
{   
    // Menentukan kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ];


    // Menentukan kolom yang tidak boleh diisi secara massal
    protected $guarded = [ 
        'id',
        'created_at',
        'updated_at'
    ];

    // Konstanta yang mendefinisikan prioritas tugas yang tersedia
    // Setiap prioritas akan diberikan warna sesuai dengan kondisi tertentu
    const PRIORITIES = [
        'low',
        'medium',
        'high'
    ];

    // Fungsi accessor untuk mendapatkan kelas warna berdasarkan prioritas
    public function getPriorityClassAttribute()
    {
        return match ($this->attributes['priority']) {
            'low' => 'success', // Hijau (prioritas rendah)
            'medium' => 'warning', //kuning (prioritas menengah)
            'high' => 'danger', //merah (prioritas tinggi)
            default => 'secondary' //abu-abu (jika tidak ada yang cocok)
        };
    }

    // Relasi satu ke banyak (TaskList memiliki banyak Task)
    public function list()
    {
        return $this->belongsTo(TaskList::class, 'list_id'); // Task terkait dengan satu TaskList berdasarkan 'list_id'
    }
}