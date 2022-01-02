<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function resultKp()
    {
        $this->hasOne(ResultKp::class, 'group_id');
    }

    public function students()
    {
        $this->hasMany(Student::class, 'group_id');
    }
}
