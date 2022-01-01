<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKp extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_kp';

    protected $fillable = [
        'name',
        'address',
        'telephone',
        'postal_code',
        'city',
    ];

    public function resultsKp()
    {
        return $this->hasMany(ResultKp::class, 'pengajuan_kp_id');
    }
}
