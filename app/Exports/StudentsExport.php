<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    protected $fields = ['teacher_id','student_name', 'address', 'city', 'phone', 'status'];
    protected $headings = ['Teacher Id','Student Name', 'Address', 'City', 'Phone', 'Status'];

    public function collection()
    {
        // get students record
        $students = Student::all($this->fields);

        //remove student_name hyphens
        foreach ($students as $student) {
            $student->student_name = str_replace('-', ' ', $student->student_name);
            $student->teacher_id = str_replace('-', ' ', $student->teacher_id);
        }

        return $students;
    }

    public function headings(): array
    {
        return $this->headings;
    }
}
