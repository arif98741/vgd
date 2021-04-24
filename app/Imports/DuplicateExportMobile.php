<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DuplicateExportMobile implements FromCollection, WithHeadings
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
            'Name',
            'Father/Husband',
            'Mother',
            'Union',
            'Ward',
            'Card No',
            'Nid',
            'Mobile',
        ];
    }
}
