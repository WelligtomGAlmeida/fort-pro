<?php

namespace Tests\Feature;

use App\Account;
use App\AccountBalance;
use App\AccountCategory;
use App\AccountType;
use App\Bank;
use App\Card;
use App\Loan;
use App\Person;
use App\Transaction;
use App\TransactionAccount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Testing the insertion of an Account in the database
     */
    function testCreateAccount(){

        $account = factory(Account::class)->create();

        $this->assertDatabaseHas('accounts', ['id' => $account->id]);
    }

    /*
     * Testing Relationship between Account and Person
     * Accounts belongs to Person
     */
    function testRelationshipAccountPerson(){

        $account = factory(Account::class)->create();

        $account = Account::find($account->id);
        $person = Person::find($account->person_id);

        $this->assertTrue($account->person == $person);
    }

    /*
     * Testing Relationship between Account and AccountCategory
     * Accounts belongs to AccountCategory
     */
    function testRelationshipAccountAccountCategory(){

        $account = factory(Account::class)->create();

        $account = Account::find($account->id);
        $accountCategory = AccountCategory::find($account->account_category_id);

        $this->assertTrue($account->accountCategory == $accountCategory);
    }

    /*
     * Testing Relationship between Account and Bank
     * Accounts belongs to Bank
     */
    function testRelationshipAccountBank(){

        $account = factory(Account::class)->create();

        $account = Account::find($account->id);
        $bank = Bank::find($account->bank_id);

        $this->assertTrue($account->bank == $bank);
    }

    /*
     * Testing Relationship between Account and AccountType
     * Accounts belongs to AccountType
     */
    function testRelationshipAccountAccountType(){

        $account = factory(Account::class)->create();

        $account = Account::find($account->id);
        $accountType = AccountType::find($account->account_type_id);

        $this->assertTrue($account->accountType == $accountType);
    }

    /*
     * Testing Relationship between Account and AccountBalance
     * Account has many AccountBalances
     */
    function testRelationshipAccountAccountBalance(){

        $accountBalance = factory(AccountBalance::class)->create();

        $account = Account::find($accountBalance->account_id);
        $accountBalance = AccountBalance::where([
            'account_id' => $accountBalance->account_id,
            'save_point_id' => $accountBalance->save_point_id
        ])->first();

        $this->assertTrue($account->accountBalances->first() == $accountBalance);
    }

    /*
     * Testing Relationship between Account and CreditedLoan(Loan)
     * Account has many CreditedLoans(Loans)
     */
    function testRelationshipAccountCreditedLoan(){

        $creditedLoan = factory(Loan::class)->create();

        $account = Account::find($creditedLoan->credit_account_id);
        $creditedLoan = Loan::find($creditedLoan->id);

        $this->assertTrue($account->creditedLoans->first() == $creditedLoan);
    }

    /*
     * Testing Relationship between Account and DebitedLoan(Loan)
     * Account has many DebitedLoans(Loans)
     */
    function testRelationshipAccountDebitedLoan(){

        $debitedLoan = factory(Loan::class)->create();

        $account = Account::find($debitedLoan->debit_account_id);
        $debitedLoan = Loan::find($debitedLoan->id);

        $this->assertTrue($account->debitedLoans->first() == $debitedLoan);
    }

    /*
     * Testing Relationship between Account and Card
     * Account has many Cards
     */
    function testRelationshipAccountCard(){

        $card = factory(Card::class)->create();

        $account = Account::find($card->account_id);
        $card = Card::find($card->id);

        $this->assertTrue($account->cards->first() == $card);
    }

    /*
     * Testing Relationship between Account and Transaction
     * Account belongs to many Transaction
     */
    function testRelationshipAccountTransaction(){

        $transactionAccount = factory(TransactionAccount::class)->create();

        $transaction = Transaction::find($transactionAccount->transaction_id);
        $account = Account::find($transactionAccount->account_id);

        $this->assertTrue($account->transactions->first()->id == $transaction->id);
    }
}
