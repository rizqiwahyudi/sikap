<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $table = 'academic_years';

    protected $fillable = [
        'academic_year',
    ];

    public function students(){
        return $this->hasMany(Student::class, 'academic_year_id');
    }

    public function majors(){
        return $this->hasMany(Major::class, 'academic_year_id');
    }
}
