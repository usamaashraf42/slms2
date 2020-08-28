<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\FromCollection;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
class CsvDataImport implements FromCollection
{

	public function collection()
    {   
        return User::all();
    }

	// public function model(array $row)
 //    {
 //       dd($row);

 //    }

// public function collection(Collection $rows)
// {
// // dd($rows);
//     return $rows;

// }

// // headingRow function is use for specific row heading in your xls file
// public function headingRow(): int
// {
//     return 3;
// }

}

