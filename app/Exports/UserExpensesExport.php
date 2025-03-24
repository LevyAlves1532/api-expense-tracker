<?php

namespace App\Exports;

use App\Models\Expense;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExpensesExport implements FromCollection, WithMapping, WithHeadings
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
        return Expense::where('user_id', $this->user_id)->get();
    }

    public function map($expense): array
    {
        return [
            $expense->category,
            'R$' . number_format($expense->amount, 2, ',', '.'),
            Carbon::parse($expense->date)->format('d/m/Y')
        ];
    }

    public function headings(): array
    {
        return [
            'Category',
            'Amount',
            'Date',
        ];
    }
}
