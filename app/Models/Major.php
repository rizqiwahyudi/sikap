<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'academic_year_id',
    ];

    public function students()
    {
        $this->hasMany(Student::class, 'major_id');
    }

    public function kelas()
    {
        $this->hasMany(Kelas::class, 'kelas_id');
    }

    public function academicYear()
    {
        $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
}
