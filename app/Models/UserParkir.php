<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserParkir extends Model
{
    use HasFactory;

    protected $table = 'user_parkir';

    protected $fillable = [
        'user_id',
        'parkir_id',
        'kode_parkir',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parkir()
    {
        return $this->belongsTo(Parkir::class);
    }
}
