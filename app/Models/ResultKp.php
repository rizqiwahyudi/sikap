<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultKp extends Model
{
    use HasFactory;

    protected $table = 'results_kp';
    protected $fillable = [
        'lecturer_id',
        'list_kp_id',
        'group_id',
        'pengajuan_kp_id',
        'periode',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function listKp()
    {
        return $this->belongsTo(ListKp::class, 'list_kp_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function pengajuanKp()
    {
        return $this->belongsTo(PengajuanKp::class, 'pengajuan_kp_id');
    }
}
