<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountCategory;
use App\AccountType;
use App\Bank;
use App\Person;
use Doctrine\DBAL\Schema\View;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->session()->all());
        return View('account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountCategories = AccountCategory::all();
        $banks = Bank::all();

        return View('account.form', compact([
            'accountCategories',
            'banks'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_type' => '',
            'account_category' => 'required|integer',
            'bank' => '',
            'name' => 'required|min:2|max:100',
            'agency' => 'max:10',
            'number' => 'max:12',
            'check_digit' => 'max:5',
        ]);

        $newAccount = new Account([
            'person_id' => Auth::user()->id,
            'account_type_id' => $request->account_type,
            'account_category_id' => $request->account_category,
            'bank_id' => $request->bank,
            'name' => $request->name,
            'agency' => $request->agency,
            'number' => $request->number,
            'check_digit' => $request->check_digit,
            'erasable' => true,
        ]);

        try{
            $newAccount->save();
        }catch(Exception $e){
            $request->session()->flash('danger', 'An error occurred while storing the account!');
            return redirect()->route('account.index');
        }

        $request->session()->flash('success', 'The account was registered!');
        return redirect()->route('account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accountCategories = AccountCategory::all();
        $banks = Bank::all();
        $account = Account::find($id);

        return View('account.form', compact([
            'accountCategories',
            'banks',
            'account'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'account_type' => '',
            'account_category' => 'required|integer',
            'bank' => '',
            'name' => 'required|min:2|max:100',
            'agency' => 'max:10',
            'number' => 'max:12',
            'check_digit' => 'max:5',
        ]);

        $account = Account::find($id);

        if(!isset($account)){
            return response('The account was not found!', 404);
        }

        $account->fill([
            'account_type_id' => $request->account_type,
            'account_category_id' => $request->account_category,
            'bank_id' => $request->bank,
            'name' => $request->name,
            'agency' => $request->agency,
            'number' => $request->number,
            'check_digit' => $request->check_digit,
        ]);

        try{
            $account->save();
        }catch(Exception $e){
            $request->session()->flash('danger', 'An error occurred while updating the account!');
            return redirect()->route('account.index');
        }

        $request->session()->flash('success', 'The account has been updated!');
        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $account = Account::find($id);

        if(!isset($account)){
            return response('The account was not found!', 404);
        }

        try{
            $account->delete();
        }catch(Exception $e){
            return response()->json([
                'status' => 'danger',
                'message' => 'An error occurred while deleting the account!'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'The account has been deleted!'
        ]);
    }

    /**
     * Find the account that has the string specified in the name
     *
     * @param  String  $search
     * @return \Illuminate\Http\Response
     */
    public function search($search = ''){

        $accounts = Account::where('name','like','%' . $search . '%')
                        ->where('person_id', Auth::user()->id)->get();

        return response()->json($accounts);
    }

    /**
     * Find the account that has the string specified in the name
     *
     * @param  String  $search
     * @return \Illuminate\Http\Response
     */
    public function find($id){

        $account = Account::where('id', $id)->with(['bank', 'accountType'])->first();

        if(!isset($account)){
            return response()->json('The account was not found!', 404);
        }

        return response()->json($account);
    }
}
