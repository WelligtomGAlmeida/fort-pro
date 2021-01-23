<?php

namespace App\Services;

use App\Repositories\BalanceRepository;
use DateTime;

class BalanceService
{
    private $balanceRepository;

    public function __construct()
    {
        $this->balanceRepository = new BalanceRepository;
    }

    /**
     * Get the balance on the especified date
     *
     * @param DateTime $date
     * @return int
     */
    public static function getBalance(DateTime $date)
    {
        return BalanceRepository::getBalance($date);
    }

    /**
     * Get the accounts balances on the especified date
     *
     * @param DateTime $date
     * @return int
     */
    public static function getAccountsBalances(DateTime $date)
    {
        $balance = BalanceRepository::getBalance($date);
        $accountsBalances = BalanceRepository::getAccountsBalances($date);

        $accountsBalancesFormatted = [
            'total_positive_balance' => 0.0,
            'total_negative_balance' => 0.0,
            'accounts_with_positive_balance' => [],
            'accounts_with_negative_balance' => []
        ];

        // calculating total value of accounts with positive and negative balance
        foreach($accountsBalances as $accountBalance){
            if(\doubleval($accountBalance['balance']) >= 0)
                $accountsBalancesFormatted['total_positive_balance'] += \doubleval($accountBalance['balance']);
            else
                $accountsBalancesFormatted['total_negative_balance'] += \doubleval($accountBalance['balance']);
        }

        // calculating the percentage of the accounts balances
        foreach($accountsBalances as $accountBalance){
            if(\doubleval($accountBalance['balance']) > 0){
                array_push($accountsBalancesFormatted['accounts_with_positive_balance'], [
                    'account_name' => $accountBalance['name'],
                    'color' => $accountBalance['color'],
                    'value' => $accountBalance['balance'],
                    'percentage' => \doubleval($accountBalance['balance']) * 100 / $accountsBalancesFormatted['total_positive_balance']
                ]);
            }
            else if(\doubleval($accountBalance['balance']) < 0){
                array_push($accountsBalancesFormatted['accounts_with_negative_balance'], [
                    'account_name' => $accountBalance['name'],
                    'color' => $accountBalance['color'],
                    'value' => $accountBalance['balance'],
                    'percentage' => \doubleval($accountBalance['balance']) * 100 / $accountsBalancesFormatted['total_negative_balance']
                ]);
            }
        }

        return $accountsBalancesFormatted ?? [];
    }
}
