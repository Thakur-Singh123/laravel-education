<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    protected $fields = ['name','address','phone_no','city','state','country','pin_code','status','image'];
    protected $headings =['Name', 'Address', 'Phone No', 'City', 'State', 'Country', 'Pin Code', 'Status', 'Image', 'Date', 'Time'];

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //ge products record
        $products = Product::all($this->fields);

        //remove hyphens prodcuts fields
        foreach ($products as $product) {
            $product->phone_no = str_replace('-', ' ', $product->phone_no);
            $product->pin_code = str_replace('-', ' ', $product->pin_code);
        }

        return $products;
    }
    
    //product heading
    public function headings(): array {
        return $this->headings;
    }

    //current time and data
    public function map($product): array {
        return [
            $product->name,
            $product->address,
            $product->phone_no,
            $product->city,
            $product->state,
            $product->country,
            $product->pin_code,
            $product->status,
            $product->image,
            now()->toDateString(), 
           now()->toTimeString(), 
        ];
    }
}
