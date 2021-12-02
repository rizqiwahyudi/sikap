<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'nip',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function resultsKp()
    {
        return $this->hasMany(ResultKp::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
