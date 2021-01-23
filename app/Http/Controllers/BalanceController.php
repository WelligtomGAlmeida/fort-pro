<?php

namespace App\Http\Controllers;

use App\Services\BalanceService;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBalance()
    {
        return response()->json([
            'status' => 'success',
            'value' => BalanceService::getBalance(new DateTime())
        ]);
    }

    public function getAccountsBalances(){
        return response()->json([
            'status' => 'success',
            'data' => BalanceService::getAccountsBalances(new DateTime())
        ]);
    }
}
