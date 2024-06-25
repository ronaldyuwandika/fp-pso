<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;

    protected $table = 'parkir';

    protected $fillable = [
        'kode_parkir',
        'nama_parkir',
        'kuota_parkir',
        'kendaraan_parkir',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function parkir()
    {
        return $this->belongsToMany(Parkir::class);
    }
}
