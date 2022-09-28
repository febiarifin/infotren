<?php

namespace App\Imports;

use App\Models\Biaya;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BiayasImport implements ToModel, WithHeadingRow
{
    public function __construct($pesantren)
    {
        $this->pesantren = $pesantren;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Biaya([
            'description' => $row['description'],
            'value' => $row['value'],
            'pesantren_id' => $this->pesantren,
        ]);
    }
}