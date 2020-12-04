<?php

namespace App\Http\Controllers;

use App\Services\BalanceService;
use DateTime;
use Illuminate\Support\Facades\Date;

class ControlPanelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('control-panel.index');
    }
}
