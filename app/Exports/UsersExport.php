<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    protected $fields = ['id', 'name', 'email', 'user_type'];

    public function collection()
    {
        return User::all($this->fields);
    }

    public function headings(): array
    {
        return array_map('strtoupper', $this->fields);
    }
}
