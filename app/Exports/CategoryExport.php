<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $category;

    public function __construct($category)
    {
        $this->category = $category;
    }
    public function collection()
    {
        return $this->category;
    }


    public function array(): array
    {
        return $this->category;
    }


    public function map($row): array
    {


        return [
            'id' => $row->id,
            'title' => $row->title,
            'category' => $row->category,
            'description' => $row->description,
        ];
    }


    public function headings(): array
    {
        return [
            'id',
            'title',
            'category',
            'description',
        ];
    }
}
