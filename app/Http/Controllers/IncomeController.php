<?php

namespace App\Http\Controllers;

use App\Exports\UserIncomesExport;
use App\Http\Requests\Income\StoreRequest;
use App\Models\Income;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->get();
        return $incomes;
    }

    public function store(StoreRequest $request)
    {
        $body = $request->only('icon', 'source', 'amount', 'date');
        $body['user_id'] = Auth::id();

        return Income::create($body);
    }

    public function delete(string $id)
    {
        $income = Income::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$income)
            return response()->json(['error' => 'Income not found!'], 404);

        $income->delete();

        return response()->json([ 'message' => 'Income deleted successfully' ]);
    }

    public function downloadIncomeExcel(string $user_id)
    {
        if (User::find($user_id)) {
            return Excel::download(new UserIncomesExport($user_id), 'incomes.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        } else {
            return response()->json(['User not exists'], 404);
        }
    }
}
