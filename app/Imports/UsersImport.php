<?php

namespace App\Imports;


use App\Models\Usertemp;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Usertemp([
            'name'  => $row['nom'],
            'firstname'  => $row['prenom'],
            //'role'  => 'membre',
            'ajour'  => '1',
            'tel'  => $row['tel'],
            //'statut'  => $row['statut'],
            'email' => $row['email'],
            'password' => \Hash::make('123456')
        ]);
    }
}
