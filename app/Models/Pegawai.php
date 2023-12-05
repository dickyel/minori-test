<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pegawais';

    public function trainings()
    {
        return $this->belongsToMany(Training::class, 'pegawai_trainings', 'pegawai_id', 'training_id')
            ->withPivot('tgl_sertifikat')
            ->withTimestamps();
    }
}
