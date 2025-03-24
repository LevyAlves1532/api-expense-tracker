<?php

namespace App\Http\Controllers;

use App\Http\Requests\Expense\StoreRequest;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\UserExpensesExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->get();
        return $expenses;
    }

    public function store(StoreRequest $request)
    {
        $body = $request->only('icon', 'category', 'amount', 'date');
        $body['user_id'] = Auth::id();

        return Expense::create($body);
    }

    public function delete(string $id)
    {
        $expense = Expense::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$expense)
            return response()->json(['error' => 'Expense not found!'], 404);

        $expense->delete();

        return response()->json([ 'message' => 'Expense deleted successfully' ]);
    }

    public function downloadExpenseExcel(string $user_id)
    {
        if (User::find($user_id)) {
            return Excel::download(new UserExpensesExport($user_id), 'expenses.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        } else {
            return response()->json(['User not exists'], 404);
        }
    }
}
