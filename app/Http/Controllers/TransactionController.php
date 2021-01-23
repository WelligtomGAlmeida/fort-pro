<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use DateTime;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct()
    {
        $this->transactionService = new TransactionService();
    }

    /**
     * Return the total of incomes and expenses in a period
     *
     * @return \Illuminate\Http\Response
     */
    public function getMonthResume()
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->transactionService->getMonthResume(new DateTime())
        ]);
    }


    /**
     * Return the total of incomes and expenses in a period
     *
     * @return \Illuminate\Http\Response
     */
    public function getTransactionsMonths()
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->transactionService->getTransactionsMonths()
        ]);
    }

    /**
     * Return the transactions of a Month
     *
     * @return \Illuminate\Http\Response
     */
    public function getMonthTransactions($month)
    {

        return response()->json([
            'status' => 'success',
            'data' => $this->transactionService->getMonthTransactions(new DateTime($month))
        ]);
    }
}
