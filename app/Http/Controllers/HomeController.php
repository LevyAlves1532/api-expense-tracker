<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data['total_income'] = Income::where('user_id', Auth::id())->sum('amount');
        $data['total_expense'] = Expense::where('user_id', Auth::id())->sum('amount');
        $data['total_balance'] = $data['total_income'] - $data['total_expense'];

        $last60Days = Carbon::now()->subDays(60)->format('Y-m-d');

        $last60DaysIncomeTransactions = Income::where('user_id', Auth::id())
            ->where('date', '>', $last60Days)
            ->orderBy('date', 'desc')
            ->get();
        $data['last_60_days_income']['total'] = $last60DaysIncomeTransactions->sum('amount');
        $data['last_60_days_income']['transactions'] = $last60DaysIncomeTransactions;

        $last30Days = Carbon::now()->subDays(60)->format('Y-m-d');

        $last30DaysExpenseTransactions = Expense::where('user_id', Auth::id())
            ->where('date', '>', $last30Days)
            ->orderBy('date', 'desc')
            ->get();
        $data['last_30_days_expense']['total'] = $last30DaysExpenseTransactions->sum('amount');
        $data['last_30_days_expense']['transactions'] = $last30DaysExpenseTransactions;

        $data['last_transactions'] = collect([]);
        $data['last_transactions'] = $data['last_transactions']->merge(Income::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->take(5)
            ->get()
            ->map(function ($income) {
                $income['type'] = 'income';
                return $income;
            }));
        $data['last_transactions'] = $data['last_transactions']->merge(Expense::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->take(5)
            ->get()
            ->map(function ($income) {
                $income['type'] = 'expense';
                return $income;
            }));
        $data['last_transactions'] = [
            ...$data['last_transactions']->sortByDesc(function ($transaction) {
                return $transaction->date;
            })->toArray(),
        ];

        return $data;
    }
}
