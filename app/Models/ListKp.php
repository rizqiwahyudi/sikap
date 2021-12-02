<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListKp extends Model
{
    use HasFactory;

    protected $table = 'lists_kp';
    protected $fillable = [
        'name',
        'address',
        'telephone',
        'postal_code',
        'city',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function resultsKp()
    {
        return $this->hasMany(ResultKp::class);
    }
}
