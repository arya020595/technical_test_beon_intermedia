<?php

namespace App\Services;

use App\Models\Expense;

class ExpenseService
{
    public function getAllExpenses()
    {
        return Expense::all();
    }

    public function createExpense($data)
    {
        return Expense::create($data);
    }

    public function updateExpense(Expense $expense, $data)
    {
        $expense->update($data);
        return $expense;
    }

    public function deleteExpense(Expense $expense)
    {
        $expense->delete();
    }
}
