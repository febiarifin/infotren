<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'value',
        'pesantren_id',
    ];

    public function pesantren()
    {
        return $this->belongsTo(Pesantren::class);
    }
}