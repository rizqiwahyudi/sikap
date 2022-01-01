<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'name',
        'major_id',
    ];

    public function major()
    {
        $this->belongsTo(Major::class, 'major_id');
    }

    public function students()
    {
        $this->hasMany(Student::class, 'kelas_id');
    }
}
