<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $with = ['list','user'];

    public $incrementing = false;
    public $keyType = 'string';

    public $fillable = [
        'id',
        'student_id',
        'teacher_id',
        'list_kp_id',
        'periode',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function student()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
        
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'student_id','id');
        
    }

    public function list()
    {
        return $this->belongsTo(List::class,'list_kp_id','id');
        
    }
}
