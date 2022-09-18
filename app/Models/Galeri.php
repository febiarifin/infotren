<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'keterangan',
        'pesantren_id',
    ];

    public function pesantren()
    {
        return $this->belongsTo(Pesantren::class);
    }
}