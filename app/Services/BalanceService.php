<?php

namespace App\Services;

use App\Transaction;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class BalanceService
{
    /**
     * Display a listing of the resource.
     *
     * @param DateTime $date
     * @return int
     */
    public static function getBalance(DateTime $date)
    {
        $transacoes = Transaction::select(DB::raw('sum(case when incomes_expenses.transaction_movement_id = 1 then transactions.value + transactions.additional_value else 0 end) - sum(case when incomes_expenses.transaction_movement_id = 2 then transactions.value + transactions.additional_value else 0 end) as balance'))
            ->join('incomes_expenses', 'incomes_expenses.id', '=', 'transactions.income_expense_id')
            ->where('transactions.payment_status_id', '=', 2)
            ->where('incomes_expenses.person_id', '=', Auth::user()->id)
            ->where('transactions.effective_date', '<=', $date->format('Y-m-d'))
            ->first();

        return \doubleval($transacoes->balance) ?? 0;
    }
}
