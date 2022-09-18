<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesantren extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'pengasuh',
        'alamat',
        'jarak',
        'konsentrasi',
        'jenjang',
        'cp_pendaftaran',
        'instagram',
        'facebook',
        'youtube',
        'website',
        'pa_pi',
        'lurah_pa',
        'lurah_pi',
        'jumlah_santri_pa',
        'jumlah_santri_pi',
        'image',
        'content',
    ];

    public function galeris()
    {
        return $this->hasMany(Galeri::class);
    }
}