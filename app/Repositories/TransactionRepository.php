<?php

namespace App\Repositories;

use App\Services\PaymentStatusService;
use App\Transaction;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    /**
     * Get the Total Incomes and the Total Expenses on a especified period
     *
     * @param DateTime $initialDate
     * @param DateTime $finalDate
     * @param array $paymentStatus
     * @return array
     */
    public function getResume(DateTime $initialDate, DateTime $finalDate, array $paymentStatus = [PaymentStatusService::PENDING, PaymentStatusService::PAID_OUT, PaymentStatusService::RECEIVED])
    {
        $resume = Transaction::select(DB::raw('transaction_movements.name, sum(transactions.value + transactions.additional_value) as value'))
            ->join('incomes_expenses', 'incomes_expenses.id', '=', 'transactions.income_expense_id')
            ->join('transaction_movements', 'incomes_expenses.transaction_movement_id', '=', 'transaction_movements.id')
            ->join('payment_status', 'transactions.payment_status_id', '=', 'payment_status.id')
            ->where('incomes_expenses.person_id', '=', Auth::user()->id)
            ->whereBetween('transactions.effective_date', [$initialDate, $finalDate])
            ->whereIn('payment_status.name', $paymentStatus)
            ->groupBy('transaction_movements.name')
            ->get();

        return $resume ?? [];
    }

    /**
     * Get the first transaction
     *
     * @return array
     */
    public function getFirstTransaction()
    {
        $transactions = Transaction::join('incomes_expenses', 'incomes_expenses.id', '=', 'transactions.income_expense_id')
            ->where('incomes_expenses.person_id', '=', Auth::user()->id)
            ->orderBy('effective_date', 'asc')
            ->orderBy('due_date', 'asc')
            ->first();

        return $transactions ?? [];
    }

    /**
     * Get the last transaction
     *
     * @return array
     */
    public function getLastTransaction()
    {
        $transactions = Transaction::join('incomes_expenses', 'incomes_expenses.id', '=', 'transactions.income_expense_id')
            ->where('incomes_expenses.person_id', '=', Auth::user()->id)
            ->orderBy('effective_date', 'desc')
            ->orderBy('due_date', 'desc')
            ->first();

        return $transactions ?? [];
    }

    /**
     * Get the transactions
     *
     * @param DateTime $initialDate
     * @param DateTime $finalDate
     * @param array $paymentStatus
     * @return array
     */
    public function getTransactions(DateTime $initialDate, DateTime $finalDate, array $paymentStatus = [PaymentStatusService::PENDING, PaymentStatusService::PAID_OUT, PaymentStatusService::CANCELED, PaymentStatusService::RECEIVED])
    {
        $transactions = Transaction::select(DB::raw("transactions.*, accounts.name as account_name, transaction_participants.name as transaction_participant_name, CASE payment_status.name WHEN 'Pending' THEN transactions.due_date ELSE transactions.effective_date END AS date"))
            ->join('incomes_expenses', 'incomes_expenses.id', '=', 'transactions.income_expense_id')
            ->join('transactions_accounts', 'transactions_accounts.transaction_id', '=', 'transactions.id')
            ->join('accounts', 'accounts.id', '=', 'transactions_accounts.account_id')
            ->leftJoin('transaction_participants', 'transaction_participants.id', '=', 'incomes_expenses.transaction_participant_id')
            ->join('payment_status', 'transactions.payment_status_id', '=', 'payment_status.id')
            ->where('incomes_expenses.person_id', '=', Auth::user()->id)
            ->whereRaw("(CASE payment_status.name WHEN 'Pending' THEN transactions.due_date ELSE transactions.effective_date END BETWEEN ? AND ? OR (transactions.due_date < ? AND payment_status.name = 'Pending'))", [$initialDate, $finalDate, (new DateTime())->format('Y-m-d')])
            ->whereIn('payment_status.name', $paymentStatus)
            ->where('transactions.payment_method_id', '=', 1)
            ->with(['transactionMovement', 'incomeExpense', 'paymentStatus'])
            ->get();

        return $transactions ?? [];
    }
}
