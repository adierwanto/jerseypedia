<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('cart')}}">Cart</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        {{-- ALERT --}}
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
        
        <br>
        <h3><b>CHECKOUT</b></h3>
        
        <div class="row">
            <div class="col">
                <a href="{{route('cart')}}" class="btn btn-sm btn-dark" style="border-radius: 20px"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <h4 class="text-center"><b>Payment Information</b></h4>
                <hr>
                <p>For payment, please transfer the amount of <strong>Rp. {{number_format($total_price)}}</strong></p>
                <div class="media">
                    <img class="mr-3" src="{{url('assets/bri.png')}}" width="70px">
                    <div class="media-body">
                        <h5 class="mt-0">BANK BRI</h5>
                        2231231232 <strong>(Damien)</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="text-center"><b>Shipping Information</b></h4>
                <hr>
                <form wire:submit.prevent="checkout">
                    <div class="form-group">
                        <label>Phone number</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" wire:model="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" wire:model="address" value="{{ old('address') }}" rows="4" required></textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-block" style="border-radius: 20px">Checkout</button>
                </form>
            </div>
        </div>
        
        
    </div>
</div>
</div>
