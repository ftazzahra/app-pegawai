<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     protected $fillable = [ 
        'nama_lengkap', 
        'email', 
        'nomor_telepon', 
        'tanggal_lahir', 
        'alamat', 
        'tanggal_masuk', 
        'departemen_id', 
        'jabatan_id',
        'status', 
    ];

    public function departments()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    public function positions()
    {
        return $this->belongsTo(Positions::class, 'jabatan_id');
    }
}

