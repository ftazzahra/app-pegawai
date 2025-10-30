<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
     protected $fillable = [ 
        'karyawan_id', 'tanggal', 'waktu_masuk', 'waktu_keluar', 'status_absensi'
    ];

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
