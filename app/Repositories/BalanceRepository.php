<?php

namespace App\Repositories;

use App\Services\PaymentStatusService;
use App\Transaction;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BalanceRepository
{
    /**
     * Get the balance on the especified date
     *
     * @param DateTime $date
     * @return double
     */
    public static function getBalance(DateTime $date)
    {
        $transacoes = Transaction::select(DB::raw('sum(case when incomes_expenses.transaction_movement_id = 1 then transactions.value + transactions.additional_value else 0 end) - sum(case when incomes_expenses.transaction_movement_id = 2 then transactions.value + transactions.additional_value else 0 end) as balance'))
            ->join('incomes_expenses', 'incomes_expenses.id', '=', 'transactions.income_expense_id')
            ->join('payment_status', 'transactions.payment_status_id', '=', 'payment_status.id')
            ->whereIn('payment_status.name', [PaymentStatusService::PAID_OUT, PaymentStatusService::RECEIVED])
            ->where('incomes_expenses.person_id', '=', Auth::user()->id)
            ->where('transactions.effective_date', '<=', $date->format('Y-m-d'))
            ->first();

        return \doubleval($transacoes->balance) ?? 0;
    }

    /**
     * Get the accounts balances on the especified date
     *
     * @param DateTime $date
     * @return array
     */
    public static function getAccountsBalances(DateTime $date)
    {
        $accountsBalances = Transaction::select(DB::raw('accounts.name, colors.color, sum(case when transactions.transaction_movement_id = 1 then transactions.value else 0 end) - sum(case when transactions.transaction_movement_id = 2 then transactions.value else 0 end) as balance'))
            ->join('transactions_accounts', 'transactions_accounts.transaction_id', '=', 'transactions.id')
            ->join('accounts', 'accounts.id', '=', 'transactions_accounts.account_id')
            ->join('colors', 'accounts.color_id', '=', 'colors.id')
            ->join('payment_status', 'transactions.payment_status_id', '=', 'payment_status.id')
            ->whereIn('payment_status.name', [PaymentStatusService::PAID_OUT, PaymentStatusService::RECEIVED])
            ->where('accounts.person_id', '=', Auth::user()->id)
            ->where('transactions.payment_method_id', '=', 1)
            ->where('transactions.effective_date', '<=', $date->format('Y-m-d'))
            ->groupBy('accounts.name', 'colors.color')
            ->orderBy('balance')
            ->get();

        return $accountsBalances ?? [];
    }
}
