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
        'kontak',
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

    public function konsentrasis()
    {
        return $this->belongsToMany(Konsentrasi::class, 'konsentrasi_pesantren', 'pesantren_id', 'konsentrasi_id');
    }

    public function jenjangs()
    {
        return $this->belongsToMany(Jenjang::class, 'jenjang_pesantren', 'pesantren_id', 'jenjang_id');
    }
}