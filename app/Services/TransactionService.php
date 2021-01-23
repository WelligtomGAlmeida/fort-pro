<?php

namespace App\Services;

use App\Repositories\BalanceRepository;
use App\Repositories\TransactionRepository;
use Carbon\Traits\Timestamp;
use DateTime;

class TransactionService
{
    private $transactionRepository;

    public function __construct()
    {
        $this->transactionRepository = new TransactionRepository;
    }

    /**
     * Get the Total Incomes and the Total Expenses on a especified period
     *
     * @param Datetime $date
     * @return array
     */
    public function getMonthResume(Datetime $date)
    {
        $initialDate = new DateTime($date->format('Y-m-01'));
        $finalDate = new DateTime($date->format('Y-m-t'));

        $resume = $this->transactionRepository->getResume($initialDate, $finalDate);

        $resumeFormatted = [
            'cash_inflow' => 0.0,
            'cash_outflow' => 0.0,
            'cash_residual' => 0.0
        ];

        foreach($resume as $resumeItem){
            $resumeFormatted[strtolower(str_replace(' ', '_', $resumeItem['name']))] = \doubleval($resumeItem['value']);
        }

        $resumeFormatted['cash_residual'] = $resumeFormatted['cash_inflow'] - $resumeFormatted['cash_outflow'];

        return $resumeFormatted ?? [];
    }

    /**
     * Get the Transactions
     *
     * @param Datetime $date
     * @return array
     */
    public function getTransactionsMonths()
    {
        $transactionsMonths = [];

        //Creating a array that represents the month of a year
        $months = [
            1 => 'JANUARY',
            2 => 'FEBRUARY',
            3 => 'MARCH',
            4 => 'APRIL',
            5 => 'MAY',
            6 => 'JUNE',
            7 => 'JULY',
            8 => 'AUGUST',
            9 => 'SEPTEMBER',
            10 => 'OCTOBER',
            11 => 'NOVEMBER',
            12 => 'DECEMBER'
        ];

        // Getting the first transaction
        $firstTransaction = $this->transactionRepository->getFirstTransaction();
        $lastTransaction = $this->transactionRepository->getLastTransaction();

        //Generating the current date, the first transaction date and the last transaction date
        $currentDate = new DateTime();
        $firstTransactionDate = new DateTime(!is_null($firstTransaction['effective_date']) && $firstTransaction['effective_date'] < $firstTransaction['due_date'] ? $firstTransaction['effective_date'] : $firstTransaction['due_date']);
        $lastTransactionDate = new DateTime(!is_null($lastTransaction['effective_date']) && $lastTransaction['effective_date'] > $lastTransaction['due_date'] ? $lastTransaction['effective_date'] : $lastTransaction['due_date']);

        $firstDate = new DateTime($firstTransactionDate < $currentDate ? $firstTransactionDate->format('Y-m-01') : $currentDate->format('Y-m-01'));
        $firstYear = $firstTransactionDate < $currentDate ? $firstTransactionDate->format('Y') : $currentDate->format('Y');
        $lastDate = new DateTime($lastTransactionDate > $currentDate ? $lastTransactionDate->format('Y-m-01') : $currentDate->format('Y-m-01'));
        $lastYear = $lastTransactionDate > $currentDate ? $lastTransactionDate->format('Y') : $currentDate->format('Y');

        $year = $firstYear;
        do{
            foreach($months as $monthKey => $monthName){
                $date = new DateTime($year . '-' . str_pad($monthKey, 2, '0', STR_PAD_LEFT) . '-01');

                if($date >= $firstDate && $date <= $lastDate){
                    array_push($transactionsMonths, [
                        'date' => $date->format('Y-m-01'),
                        'description' => $monthName . ' ' .$year
                    ]);
                }
            }

            $year++;
        }while($year <= $lastYear);

        $transactionsMonths = array_reverse($transactionsMonths);

        return $transactionsMonths ?? [];
    }

    /**
     * Get the Transactions
     *
     * @param Datetime $date
     * @return array
     */
    public function getMonthTransactions(Datetime $date)
    {
        $transactionsFormatted = [];
        $statusesAccepted = [];

        // Generating the initial date, the final date, the one day before initial date and the current date
        $initialDate = new DateTime($date->format('Y-m-01'));
        $finalDate = new DateTime($date->format('Y-m-t'));
        $oneDayBeforeInitialDate = new DateTime(date('Y-m-d', strtotime('-1 day', strtotime($initialDate->format('Y-m-01')))));
        $currentDate = new DateTime();

        if($currentDate > $initialDate && $currentDate > $finalDate){
            $statusesAccepted = [
                PaymentStatusService::PAID_OUT,
                PaymentStatusService::RECEIVED
            ];
        }
        else if($currentDate >= $initialDate && $currentDate <= $finalDate){
            $statusesAccepted = [
                PaymentStatusService::PAID_OUT,
                PaymentStatusService::RECEIVED,
                PaymentStatusService::PENDING
            ];
        }
        else if($currentDate < $initialDate && $currentDate < $finalDate){
            $statusesAccepted = [
                PaymentStatusService::PENDING
            ];
        }

        // Getting the transactions and the previous balance
        $transactions = $this->transactionRepository->getTransactions($initialDate, $finalDate, $statusesAccepted);
        $balance = BalanceRepository::getBalance($oneDayBeforeInitialDate);

        // Generating a new array from the results
        foreach($transactions as $transaction){
            $transactionTotalValue = $transaction->value + $transaction->additional_value;
            $late = $transaction->paymentStatus->name == PaymentStatusService::PENDING && $currentDate > $transaction->date;
            $date = $late ? $finalDate->format('Y-m-d') : $transaction->date;
            $status = $late ? 'Overdue' : $transaction->paymentStatus->name;

            array_push($transactionsFormatted, [
                'id' => $transaction->id,
                'date' => (new DateTime($date))->format('d/m/Y'),
                'name' => ($transaction->incomeExpense->installments > 1 ? $transaction->installment_number . '/' . $transaction->incomeExpense->installments . ' - ' : '') .
                    (!is_null($transaction->transaction_participant_name) && !empty($transaction->transaction_participant_name) ? $transaction->transaction_participant_name . ' - ' : '') .
                    $transaction->incomeExpense->name,
                'status' => $status,
                'transaction_movement_name' => $transaction->transactionMovement->name,
                'account_name' => $transaction->account_name,
                'value' => $transactionTotalValue,
                'effective_date' => (new DateTime($transaction->effective_date))->format('d/m/Y'),
                'due_date' => (new DateTime($transaction->due_date))->format('d/m/Y')
            ]);
        }

        // Ordering the transactions by date
        usort($transactionsFormatted, [$this, 'orderByDate']);

        // Calculating the balance after each transaction
        foreach($transactionsFormatted as $transactionKey => $transaction){
            $value = $transaction['transaction_movement_name'] === 'Cash outflow' ? ($transaction['value'] * (-1)) : $transaction['value'];

            if($transaction['status'] != PaymentStatusService::CANCELED)
                $balance = $balance + $value;

            $transactionsFormatted[$transactionKey]['balance'] = $balance;
            $transactionsFormatted[$transactionKey]['value'] = $value;
        }

        return $transactionsFormatted ?? [];
    }

    /**
     * Order Transactions by date
     */
    public function orderByDate($current, $next)
    {
        if ($current['date'] == $next['date']){
            return ($current['id'] < $next['id']) ? -1 : 1;
        }
        return ($current['date'] < $next['date']) ? -1 : 1;
    }
}
