@extends('layouts.user')
@section('title','Account')

@section('content')
<div class="row ">
    <div class="col-md-12">
        <div class="card bd-callout-warning">
            <div class="card-header d-flex justify-content-between">
                <p class="text-success text-lg">Accounts</p>
                <a class="btn btn-success float-right" href="{{ Route('account.create') }}">Register Account</a>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                       {{ session('success') }}
                    </div>
                @endif
                @if(Session::has('danger'))
                    <div class="alert alert-danger">
                    {{ session('danger') }}
                    </div>
                @endif
                <input type="text" class="form-control" placeholder="Search" id="search">
                <hr>
                <div class="col-12 row" id="accounts"> </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Show -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="show-name"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12"><font style="font-weight: bold;">Account Type:</font> <font id="show-account-type"></font></div>
                <div class="col-12"><font style="font-weight: bold;">Bank:</font> <font id="show-bank"></font></div>
                <div class="col-4"><font style="font-weight: bold;">Agency:</font> <font id="show-agency"></font></div>
                <div class="col-4"><font style="font-weight: bold;">Number:</font> <font id="show-number"></font></div>
                <div class="col-4"><font style="font-weight: bold;">Check-Digit:</font> <font id="show-check-digit"></font></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            search('');
        });

        function show(id){
            $.ajax({
                url : "{{ Route('account.show', '') }}/" + id,
                type : 'get',
                async: true,
            }).done(function(account){
                $('#show-name').html(account.name);
                $('#show-account-type').html(account.account_type != null ? account.account_type.name : '' );
                $('#show-bank').html(account.bank != null ? account.bank.name : '' );
                $('#show-agency').html(account.agency != null ? account.agency : '' );
                $('#show-number').html(account.number != null ? account.number : '' );
                $('#show-check-digit').html(account.check_digit != null ? account.check_digit : '' );

                $("#show").modal();

            }).fail(function(jqXHR, textStatus, msg){

                console.log('An error occurred while finding the account');

            });
        }

        function confirmDelete(id){
            $.ajax({
                url : "{{ Route('account.show', '') }}/" + id,
                type : 'get',
                async: true,
            }).done(function(account){
                body =  '<p><strong>Name:</strong> ' + account.name + '</p>' +
                        '<p><strong>Account Type:</strong> ' + (account.account_type != null ? account.account_type.name : '') + '</p>';

                if(account.account_category_id != 1){
                    body =  body + '<p><strong>Bank:</strong> ' + (account.bank != null ? account.bank.name : '') + '</p>' +
                            '<p><strong>Agency:</strong> ' + (account.agency != null ? account.agency : '') + '</p>' +
                            '<p><strong>Number:</strong> ' + (account.number != null ? account.number : '') + '-' + (account.check_digit != null ? account.check_digit : '') + '</p>';
                }

                Swal.fire({
                    title: '<strong>Are you sure you want to delete this account?</strong>',
                    icon: 'question',
                    html: body,
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: true,
                    confirmButtonText:
                        '<i class="fa fa-check"></i> Delete!',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    cancelButtonText:
                        '<i class="fa fa-times"></i> Cancel',
                    cancelButtonAriaLabel: 'Thumbs down'
                }).then((result) => {

                    if(result.value){
                        $.ajax({
                            url: "{{ Route('account.destroy', '') }}/" + id,
                            type : 'delete',
                            async: true,
                        }).done(function(data){
                            document.getElementsByClassName("alert")[0].remove();

                            search('');

                            message = '<div class="alert alert-' + data.status + '">' + data.message + '</div>';
                            $(message).insertBefore('#search');
                        }).fail(function(jqXHR, textStatus, msg){
                            console.log('An error occurred while deleting the account');
                        });
                    }
                });

            }).fail(function(jqXHR, textStatus, msg){

                console.log('An error occurred while finding the account');

            });
        }

        $('#search').keyup(function(){
            search(this.value);
        });

        function search(search){
            parameters = search.length > 0 ? "/" + search : "";

            $.ajax({
                url : "{{ Route('account.search', '') }}" + parameters,
                type : 'get',
                async: true,
            }).done(function(accounts){
                imagePath = '';
                $("#accounts").html("");

                $.each(accounts,function(index, value){
                    imagePath = value.account_category_id == 1 ? '{{ asset("/img/vault.jpg") }}' : '{{ asset("/img/bank.jpg") }}';
                    editUrl = '{{ route("account.edit","") }}' + "/" + value.id;

                    account = '<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 space-between-div">' +
                    '    <div class="card card-shadow account-card">' +
                    '        <img class="card-img-top" src="' +imagePath + '" alt="Bank Account" >' +
                    '        <div class="card-body">' +
                    '           <h5 class="card-title">' + value.name + '</h5>' +
                    '           <p class="card-text"><font style="font-weight: bold;">Agency:</font> ' + (value.agency !== null ? value.agency : '') + '</p>' +
                    '           <p class="card-text"><font style="font-weight: bold;">Number:</font> ' + (value.number !== null ? value.number : '') + '-' + (value.check_digit !== null ? value.check_digit : '') + '</p>' +
                    '           <div class="d-flex justify-content-around" style="margin-bottom:0;flex-shrink: 0;">' +
                    '               <a onclick="javascript:show(' + value.id + ')">' +
                    '                   <i class="fa fa-eye"></i>' +
                    '               </a>';

                    if(value.erasable){
                        account = account + '<a href="' + editUrl + '">' +
                        '               <i class="fas fa-pencil-alt fa-lg"></i>' +
                        '           </a>' +
                        '           <a onclick="javascript:confirmDelete(' + value.id + ')">' +
                        '               <i class="delete fas fa-trash-alt fa-lg"></i>' +
                        '           </a>';
                    }

                    account = account + '</div>';
                    '       </div>' +
                    '    </div>' +
                    '</div>';

                    $("#accounts").append(account);
                });

                if(accounts.length == 0){
                    $("#accounts").append("<p class='no-result'>No results Found!</p>");
                }

            }).fail(function(jqXHR, textStatus, msg){

                console.log('An error occurred while fetching the accounts');

            });
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
