<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TaskList;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_completed',
        'priority',
        'list_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    //const adalah nilai yang tidak bisa diubah serta  untuk mendapatkan prioritas yang nantinya setiap prioritas akan diberikan warna sesuai kondisi
    const PRIORITIES = [
        'low',
        'medium',
        'high'
    ];

    public function getPriorityClassAttribute() {
        return match($this->attributes['priority']) {
            'low' => 'success',//hijau
            'medium' => 'warning',//kuning
            'high' => 'danger',//merah
            default => 'secondary'//abu-abu
        };
    }

    public function list() {
        return $this->belongsTo(TaskList::class, 'list_id');
    }
}