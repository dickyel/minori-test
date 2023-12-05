<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiTraining extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pegawai_trainings';

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }
}
