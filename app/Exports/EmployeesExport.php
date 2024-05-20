<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    protected $fields = ['first_name', 'last_name', 'email', 'phone_no', 'city', 'state', 'country', 'pin_code', 'status', 'image'];
    protected $headings = ['First Name', 'Last Name', 'Email', 'Phone NO', 'City', 'State', 'Country', 'Pin Code', 'Status', 'Image'];

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        // get employees record
        $employees = Employee::select($this->fields)->get();
        // remove employees hyphens heading
        foreach ($employees as $employee) {
            $employee->first_name = str_replace('-', ' ', $employee->first_name);
            $employee->last_name = str_replace('-', ' ', $employee->last_name);
            $employee->phone_no = str_replace('-', ' ', $employee->phone_no);
            $employee->pin_code = str_replace('-', ' ', $employee->pin_code);
        }

        return $employees;
    }
    
    //Function for employee heading
    public function headings(): array {
        return $this->headings;
    }
}
