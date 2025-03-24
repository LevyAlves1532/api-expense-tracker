<?php

namespace App\Exports;

use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserIncomesExport implements FromCollection, WithMapping, WithHeadings
{
    public $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Income::where('user_id', $this->user_id)->get();
    }

    public function map($income): array
    {
        return [
            $income->source,
            'R$' . number_format($income->amount, 2, ',', '.'),
            Carbon::parse($income->date)->format('d/m/Y')
        ];
    }

    public function headings(): array
    {
        return [
            'Source',
            'Amount',
            'Date',
        ];
    }
}
