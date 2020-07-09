<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card card-shadow">
        <img class="card-img-top" src="{{ asset($accountCategory == 2 ? 'img/bank.jpg' : 'img/vault.jpg') }}" alt="Bank Account" >
        <div class="card-body">
            <h4 class="card-title">{{ $name }}</h4>
            <p class="card-text"><font style="font-weight: bold;">Agency:</font> {{ $agency }}</p>
            <p class="card-text"><font style="font-weight: bold;">Number:</font> {{ $number }}-{{ $checkDigit }}</p>

            <div class="d-flex justify-content-around">
                <a href="#" >
                    <i class="fas fa-pencil-alt fa-lg"></i>
                </a>
                <a href="#">
                    <i class="delete fas fa-trash-alt fa-lg"></i>
                </a>
            </div>
        </div>
    </div>
</div>
