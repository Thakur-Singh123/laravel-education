<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use App\Models\Employee;

class EmployeesImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'first_name' => $row[0],
            'last_name' => $row[1],
            'email' => $row[2],
            'phone_no' => $row[3],
            'city' => $row[4],
            'state' => $row[5],
            'country' => $row[6],
            'pin_code' => $row[7],
            'status' => $row[8],
            'image' => $row[9],
        ]);
    }
    
    /**
     * @return int
     */
    public function startRow(): int {
        return 2; 
    }
}
