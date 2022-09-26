<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function pesantrens()
    {
        return $this->belongsToMany(Pesantren::class, 'jenjang_pesantren', 'jenjang_id', 'pesantren_id');
    }
}