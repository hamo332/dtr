<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserLogsExport implements FromArray, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return ['#','START DATE', 'END DATE' ,'NAME', 'TIME IN', 'TIME OUT', 'TOTAL HOURS', 'WORKING HOURS', 'NORMAL HOURS',
        'EXTRA HOURS', 'V HOURS PRICE', 'EX HOURS PRICE', 'TOTAL PRICE'];
    }
}
