<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingAbsen extends Model
{
    use HasFactory;
    protected $table = 'setting_absens'; 
    protected $fillable = [
        'jam_masuk',
        'jam_keluar',
        'lokasi',
        'batas_jarak',
    ];
}
