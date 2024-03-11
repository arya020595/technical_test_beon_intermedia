<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Services\ExpenseService;
use App\Http\Requests\CreateExpensePostRequest;

class ExpenseController extends Controller
{
    protected $expenseService;

    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    public function index()
    {
        $expenses = $this->expenseService->getAllExpenses();
        return response()->json(['data' => $expenses], 200);
    }

    public function show(Expense $expense)
    {
        return response()->json(['data' => $expense], 200);
    }

    public function store(CreateExpensePostRequest $request)
    {
        $data = $request->validated();

        $expense = $this->expenseService->createExpense($data);

        return response()->json(['data' => $expense], 201);
    }

    public function update(CreateExpensePostRequest $request, Expense $expense)
    {
        $data = $request->validated();

        $expense = $this->expenseService->updateExpense($expense, $data);

        return response()->json(['data' => $expense], 200);
    }

    public function destroy(Expense $expense)
    {
        $this->expenseService->deleteExpense($expense);
        return response()->json(['message' => 'Expense deleted successfully'], 200);
    }
}
