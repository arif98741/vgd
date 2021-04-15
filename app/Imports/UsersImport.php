<?php

namespace App\Imports;

use App\Models\Beneficiary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Beneficiary([
            'name' => $row['name'],
            'fh_name' => $row['fh_name'],
            'mother_name' => $row['mother_name'],
            'union_id' => $row['union_id'],
            'ward' => $row['ward'],
            'village' => $row['village'],
            'card_no' => $row['card_no'],
            'nid' => $row['nid'],
            'mobile' => $row['mobile'],
        ]);
    }
}
