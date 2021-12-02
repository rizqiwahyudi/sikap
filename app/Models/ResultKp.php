<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultKp extends Model
{
    use HasFactory;

    protected $table = 'results_kp';
    protected $fillable = [
        'teacher_id',
        'student_id',
        'list_kp_id',
        'periode',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function listKp()
    {
        return $this->belongsTo(ListKp::class, 'list_kp_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
