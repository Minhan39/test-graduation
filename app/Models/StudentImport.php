<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Student;

class StudentImport implements ToModel, WithStartRow
{
    public function model(array $row){
        return new Student([
            'student_id' => $row[0],
            'name' => $row[1],
            'image' => $row[2],
            'degree' => $row[3],
            'majour' => $row[4],
            'participation_time' => $row[5],
            'location' => $row[6],
            'seat' => $row[7]
        ]);
    }

    public function startRow(): int{
        return 2;
    }
}
