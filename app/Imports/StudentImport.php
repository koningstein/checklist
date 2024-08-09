<?php

namespace App\Imports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class StudentImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $students = [];
        $defaultStartDate = Carbon::create(now()->year, 8, 1)->format('Y-m-d');

        foreach ($rows as $row) {
            $students[] = [
                'nummer' => $row['nummer'],
                'name' => $row['roepnaam'] . ' ' . $row['voorvoegsel'] . ' ' . $row['achternaam'],
                'email' => $row['nummer'] . '@student.tcrmbo.nl',
                'begindatum' => $defaultStartDate,
                'opleiding' => substr($row['opleiding'], 0, 5),
            ];
        }

        session(['imported_students' => $students]);
    }
}
