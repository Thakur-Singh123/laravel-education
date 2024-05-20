<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {
        return new Product([
            'name' => $row[0],
            'address' => $row[1], 
            'phone_no' => $row[2],     
            'city' => $row[3],  
            'state' => $row[4],       
            'country' => $row[5],   
            'pin_code' => $row[6],
            'status' => $row[7],
            'image' => $row[8],       
           
        ]);
    }

    
    /**
     * @return int
     */
    public function startRow(): int {
        return 2; 
    }
}
