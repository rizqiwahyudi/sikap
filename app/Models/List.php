<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'telephone',
        'postal_code',
        'city',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    public function lists()
    {
        return $this->hasMany(List::class);
    }   
}
