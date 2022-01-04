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
    ];

    public function students()
    {
        $this->hasMany(Student::class, 'major_id');
    }

    public function kelas()
    {
        $this->hasMany(Kelas::class, 'major_id');
    }
}
