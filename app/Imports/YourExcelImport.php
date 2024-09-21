<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class YourExcelImport implements ToArray, WithHeadingRow
{
    /**
    * @param array $array
    *
    */
    public function array(array $array)
    {
        
        return $array;
    }
}
