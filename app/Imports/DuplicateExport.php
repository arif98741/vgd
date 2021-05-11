<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DuplicateExport implements FromCollection, WithHeadings
{
    use Exportable;

    private $exportArray;

    public function __construct($exportArray)
    {
        $this->exportArray = $exportArray;
    }

    public function collection()
    {
        return collect([
            $this->exportArray
        ]);
    }

    public function headings(): array
    {
        return [
            'name',
            'fh_name',
            'mother_name',
            'union_id',
            'village',
            'ward',
            'card_no',
            'nid',
            'mobile',
        ];
    }
}
