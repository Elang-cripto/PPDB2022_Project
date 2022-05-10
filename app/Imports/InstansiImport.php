<?php

namespace App\Imports;

use App\Models\Asalsekolah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InstansiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Asalsekolah([
            'npsn'  => $row['npsn'],
            'lembaga' => $row['lembaga'],
            'alamat' => $row['alamat'],
            'kelurahan' => $row['kelurahan'],
            'status' => $row['status'],
        ]);
    }
}
