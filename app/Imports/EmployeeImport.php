<?php

namespace App\Imports;

use App\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

use Maatwebsite\Excel\Concerns\WithChunkReading;

class EmployeeImport implements ToCollection, WithChunkReading,  WithHeadingRow

{
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.nama' => 'required',
            '*.email' => 'required',
            '*.companies_id' => 'required',
        ])->validate();

        foreach ($rows as $row) {
            Employee::create([
                'nama' => $row['nama'],
                'email' => $row['email'],
                'companies_id' => $row['companies_id'],
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 10;
    }

}
