@extends('layouts.user')
@section('title', 'Home')

@section('content')
<div class="row ">
    <div class="col-md-12">
        <div class="card bd-callout-warning">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <span class="resume-title">Current Balance</span>
                            <p id="balance-value" class="resume-value positive-balance"></p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <span class="resume-title">This Month Total Incomes</span>
                            <p id="incomes-value" class="resume-value"></p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <span class="resume-title">This Month Total Expenses</span>
                            <p id="expenses-value" class="resume-value"></p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <span class="resume-title">This Month Total Residual</span>
                            <p id="residual-value" class="resume-value"></p>
                        </div>
                    </div>
                </div>
                <div id="balance-composition">
                </div>
                <br/>
                <div class="col-md-12">
                    <div class="transactions-list-header d-flex justify-content-between row">
                        <div>
                            <span class="col-md-3 col-sm-12 no-padding no-margin">Month Transactions</span>
                        </div>

                        <div class="col-md-3 col-sm-12 no-padding no-margin">
                            <select class="form-control" id="transactions-months">
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="month-transactions">
                            <thead>
                                <tr>
                                    <th style="width: 5%"></th>
                                    <th style="width: 10%">Date</th>
                                    <th style="width: 28%">Name</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 13%">Account</th>
                                    <th style="width: 12%">Value</th>
                                    <th style="width: 12%">Balance</th>
                                    <th style="width: 10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link href="{{ asset('css/home/home-style.css') }}" rel="stylesheet">
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            getBalance();
            getMonthResume();
            getAccountsBalances();
            getTransactionsMonths();
        });

        $('#transactions-months').change(function(){
            getMonthTransactions();
        });

        function getBalance(){
            $.ajax({
                url : "{{ Route('balance.getBalance', '') }}",
                type : 'get',
                async: true,
            }).done(function(resp){
                let balanceValue = document.getElementById('balance-value');

                balanceValue.classList.remove('positive-value');
                balanceValue.classList.remove('negative-value');

                if(resp.value < 0){
                    balanceValue.classList.add('negative-value');
                }
                else if(resp.value > 0){
                    balanceValue.classList.add('positive-value');
                }

                $('#balance-value').html('R$ ' + formatAsMoney(resp.value));

            }).fail(function(jqXHR, textStatus, msg){

                console.log('An error occurred while finding the account');

            });
        }

        function getMonthResume(){
            $.ajax({
                url : "{{ Route('transaction.getMonthResume', '') }}",
                type : 'get',
                async: true,
            }).done(function(resp){
                let residualValue = document.getElementById('residual-value');

                residualValue.classList.remove('positive-value');
                residualValue.classList.remove('negative-value');

                if(resp.data.cash_residual < 0){
                    residualValue.classList.add('negative-value');
                }
                else if(resp.data.cash_residual > 0){
                    residualValue.classList.add('positive-value');
                }

                $('#incomes-value').html('R$ ' + formatAsMoney(resp.data.cash_inflow));
                $('#expenses-value').html('R$ ' + formatAsMoney(resp.data.cash_outflow));
                $('#residual-value').html('R$ ' + formatAsMoney(resp.data.cash_residual));
            }).fail(function(jqXHR, textStatus, msg){

                console.log('An error occurred while finding the account');

            });
        }

        function getAccountsBalances(){
            $.ajax({
                url : "{{ Route('balance.getAccountsBalances', '') }}",
                type : 'get',
                async: true,
            }).done(function(resp){
                let balanceCompositionBars = '';

                if(resp.data.total_positive_balance > 0){
                    balanceCompositionBars +=
                        '<div class="col-md-12">' +
                        '   <div class="balance-composition-title">' +
                        '       <span>Accounts With Positive Balance</span>' +
                        '       <span>Total: R$ ' + formatAsMoney(resp.data.total_positive_balance) + ' </span>' +
                        '   </div>' +
                        '   <div class="balance-composition-bar row">';

                    resp.data.accounts_with_positive_balance.forEach(element => {
                        balanceCompositionBars +=
                            '<div class="balance-composition-bar--section" style="width:' + parseInt(element.percentage) + '%;">' +
                            '    <div class="balance-composition-bar--part" style="background-color:' + (element.color ?? '#d4d4d4') +' !important;">' + parseInt(element.percentage) + '% - R$ ' + formatAsMoney(element.value) + '</div>' +
                            '    <div class="balance-composition-bar--name">' + element.account_name + '</div>' +
                            '</div>';
                    });

                    balanceCompositionBars +=
                        '   </div>' +
                        '</div>';
                }

                if(resp.data.total_negative_balance < 0){
                    balanceCompositionBars +=
                        '<div class="col-md-12">' +
                        '   <div class="balance-composition-title">' +
                        '       <span>Accounts With Negative Balance</span>' +
                        '       <span>Total: R$ ' + formatAsMoney(resp.data.total_negative_balance) + ' </span>' +
                        '   </div>' +
                        '   <div class="balance-composition-bar row">';

                    resp.data.accounts_with_negative_balance.forEach(element => {
                        balanceCompositionBars +=
                            '<div class="balance-composition-bar--section" style="width:' + parseInt(element.percentage) + '%;">' +
                            '    <div class="balance-composition-bar--part" style="background-color:' + (element.color ?? '#d4d4d4') +' !important;">' + parseInt(element.percentage) + '% - R$ ' + formatAsMoney(element.value) + '</div>' +
                            '    <div class="balance-composition-bar--name">' + element.account_name + '</div>' +
                            '</div>';
                    });

                    balanceCompositionBars +=
                        '   </div>' +
                        '</div>';
                }

                $('div#balance-composition').html(balanceCompositionBars);

            }).fail(function(jqXHR, textStatus, msg){

                console.log('An error occurred while finding the account');

            });
        }

        function getTransactionsMonths(){
            $.ajax({
                url : "{{ Route('transaction.getTransactionsMonths', '') }}",
                type : 'get',
                async: true,
            }).done(function(resp){
                let transactionsMonths = '';

                resp.data.forEach(element => {
                    transactionsMonths +=
                        '<option value="' + element.date + '">' + element.description + '</option>';
                });

                $('select#transactions-months').html(transactionsMonths);
                getMonthTransactions();
            }).fail(function(jqXHR, textStatus, msg){

                console.log('An error occurred while finding the account');

            });
        }

        function getMonthTransactions(){
            let month = $('#transactions-months').val();

            if(month !== null && month !== ''){
                $.ajax({
                    url : "{{ Route('transaction.getMonthTransactions', '') }}/" + month,
                    type: 'get',
                    async: true,
                }).done(function(resp){
                    let transactions = '';

                    if(resp.data.length === 0){
                        transactions = '<tr><td colspan="8" class="text-center">There is no transaction for the specified month</td></tr>';
                    }

                    resp.data.forEach(element => {
                        statusClass = 'pending-status';

                        if(element.status === 'Canceled')
                            statusClass = 'canceled-status';
                        else if(element.status === 'Paid out' || element.status === 'Received')
                            statusClass = 'paid-out-status';
                        else if(element.status === 'Overdue')
                            statusClass = 'overdue-status';
                        else if(element.status === 'Pending')
                            statusClass = 'pending-status';

                        transactions +=
                            '<tr class="transaction">' +
                            (element.transaction_movement_name === 'Cash inflow' ? '<td class="positive"><i class="fas fa-plus"></i></td>' : '<td class="negative"><i class="fas fa-minus"></i></td>') +
                            '    <td>' + element.date + '</td>' +
                            '    <td>' + element.name + '</td>' +
                            '    <td class="' + statusClass + '">' + element.status + '</td>' +
                            '    <td>' + element.account_name + '</td>' +
                            '    <td>R$ ' + formatAsMoney(element.value) + '</td>' +
                            '    <td>R$ ' + formatAsMoney(element.balance) + '</td>' +
                            '    <td>' + (element.status === 'Pending' ? '<button class="effect-transaction-button" type="button">' + (element.transaction_movement_name === 'Cash outflow' ? 'Pay' : 'Receive') + '</button>' : '') + '</td>' +
                            '</tr>';
                    });

                    $('table#month-transactions>tbody').html(transactions);
                }).fail(function(jqXHR, textStatus, msg){

                    console.log('An error occurred while finding the account');

                });
            }
        }

        function formatAsMoney(value){
            return parseFloat(value).toFixed(2).toString().replace('.', ',');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection

