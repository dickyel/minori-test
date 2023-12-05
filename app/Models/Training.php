<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'trainings';


    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class, 'pegawai_trainings', 'training_id', 'pegawai_id')
            ->withPivot('tgl_sertifikat')
            ->withTimestamps();
    }
}
