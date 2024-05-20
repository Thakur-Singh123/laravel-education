<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StudentsImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'teacher_id' => $row[0], 
            'student_name' => $row[1], 
            'address' => $row[2],      
            'city' => $row[3],         
            'phone' => $row[4],        
            'status' => $row[5],   
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2; 
    }
}
