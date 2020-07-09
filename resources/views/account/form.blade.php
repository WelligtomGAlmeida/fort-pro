@extends('layouts.user')
@section('title','Account')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card bd-callout-warning">
            <div class="card-header">
                <p class="text-success text-lg">@if(isset($account)) Edit Account @else Register Account @endif</p>
            </div>
            <div class="card-body">
                <form id="registerForm" action=@if(isset($account)) "{{ route('account.update', $account->id) }}" @else "{{ route('account.store') }}" @endif  method="post">
                    @csrf
                    @if (isset($account))
                        <input type="hidden" name="_method" value="PUT">
                    @endif

                    <div class="row col-12">
                        <div class="form-group col-12">
                            <label for="name">Name <font class="required">*</font></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') || !isset($account) ? old('name') : $account->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="account_category">Account Category <font class="required">*</font></label>
                            <select name="account_category" id="account_category" class="form-control @error('account_category') is-invalid @enderror">
                                <option value=""></option>
                                @foreach ($accountCategories as $accountCategory)
                                    <option value="{{ $accountCategory->id }}" @if((old('account_category') || !isset($account) ? old('account_category') : $account->account_category_id) == $accountCategory->id) selected @endif>{{ $accountCategory->name }}</option>
                                @endforeach
                            </select>
                            @error('account_category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="account_type">Account Type</label>
                            <select name="account_type" id="account_type" class="form-control @error('account_type') is-invalid @enderror" value="{{ old('account_type') || !isset($account) ? old('account_type') : $account->account_type_id}}">
                                <option value=""></option>
                            </select>
                            @error('account_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label for="bank">Bank</label>
                            <select name="bank" id="bank" class="form-control @error('bank') is-invalid @enderror">
                                <option value=""></option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}" @if((old('bank') || !isset($account) ? old('bank') : $account->bank_id) == $bank->id) selected @endif>{{ $bank->name }}</option>
                                @endforeach
                            </select>
                            @error('bank')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 col-sm-12">
                            <label for="agency">Agency</label>
                            <input type="text" class="form-control @error('agency') is-invalid @enderror" value="{{ old('agency') || !isset($account) ? old('agency') : $account->agency}}" name="agency" id="agency">
                            @error('agency')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 col-sm-12">
                            <label for="number">Number</label>
                            <input type="text" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') || !isset($account) ? old('number') : $account->number}}" name="number" id="number">
                            @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 col-sm-12">
                            <label for="check_digit">Check Digit</label>
                            <input type="text" class="form-control @error('check_digit') is-invalid @enderror" value="{{ old('check_digit') || !isset($account) ? old('check_digit') : $account->check_digit}}" name="check_digit" id="check_digit">
                            @error('check_digit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 col-sm-12 text-right">
                            <a class="btn btn-danger" href="{{ route('account.index') }}">Cancel</a>
                            <button class="btn btn-success" id="register">@if(isset($account)) Update @else Register @endif</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    //Adding mask to the fields
    $('#agency').mask('0000000000');
    $('#number').mask('000000000000');
    $('#check_digit').mask('00000');

    $(document).ready(function(){
        loadAccountTypes();
        disableFields();
    });

    $('#account_category').change(function(){
        loadAccountTypes();
        disableFields();
    });

    function loadAccountTypes(){
        accountCategory = $('#account_category').val();
        $("#account_type").html("");

        if(accountCategory != ''){
            $.ajax({
                url : "{{ Route('accountType.find', '') }}" + "/" + accountCategory,
                type : 'get',
            }).done(function(accountTypes){

                $("#account_type").append('<option value=""></option>');

                $.each(accountTypes,function(index, value){
                    accountType = '<option value="' + value.id + '">' + value.name + '</option>';
                    $("#account_type").append(accountType);
                });
                $("#account_type").val("{{ isset($account) ? $account->account_type_id : '' }}");

            }).fail(function(jqXHR, textStatus, msg){

                console.log('An error occurred while fetching the account Types');

            });
        }
    }

    function disableFields(){
        accountCategory = $('#account_category').val();

        if(accountCategory == 1){
            document.getElementById("bank").value = '';
            document.getElementById("agency").value = '';
            document.getElementById("number").value = '';
            document.getElementById("check_digit").value = '';

            document.getElementById("bank").setAttribute("readonly", "true");
            document.getElementById("agency").setAttribute("readonly", "true");
            document.getElementById("number").setAttribute("readonly", "true");
            document.getElementById("check_digit").setAttribute("readonly", "true");
        }else{
            document.getElementById("bank").removeAttribute("readonly");
            document.getElementById("agency").removeAttribute("readonly");
            document.getElementById("number").removeAttribute("readonly");
            document.getElementById("check_digit").removeAttribute("readonly");
        }
    }
</script>
@endsection
