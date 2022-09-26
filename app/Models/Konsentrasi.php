<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsentrasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function pesantrens()
    {
        return $this->belongsToMany(Pesantren::class, 'konsentrasi_pesantren', 'konsentrasi_id', 'pesantren_id');
    }
}