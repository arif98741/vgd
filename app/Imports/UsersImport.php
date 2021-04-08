<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Beneficiary;
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
            'name'     => $row['name'],
            'fh_name'    => $row['fh_name'],
            'mother_name'    => $row['mother_name'],
            'union_id'    => $row['union_id'],
            'village'    => $row['village'],
            'card_no'    => $row['card_no'],
            'nid_no'    => $row['nid_no'],
            'mobile'    => $row['mobile'],
        ]);
    }
}
