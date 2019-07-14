<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return DB::table('users')->select('name', 'firstname', 'email', 'tel', 'ajour')->orderBy('name')->orderBy('firstname')->get();
    }

    public function headings(): array
    {
        return [
            'nom',
            'prenom',
            'email',
            'tel'

        ];
    }
}
