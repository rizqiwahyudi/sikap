<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'major_id',
        'kelas',
        'sub_kelas',
    ];

    public function students()
    {
        $this->hasMany(Student::class, 'kelas_id');
    }

    public function major()
    {
        $this->belongsTo(Major::class, 'major_id');
    }

    public function academicYears(){
        return $this->belongsToMany(AcademicYear::class);
    }
}
