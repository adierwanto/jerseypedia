<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Products</li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        {{-- ALERT --}}
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 shadow" style="border-radius: 30px">
                    <div class="card-body">
                        <img src="{{url('assets/jersey/'.$product->image)}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <h3><b>{{$product->name}}</b></h3>
                <h4>Rp. {{number_format($product->price)}}</h4>
                @if ($product->available == 1)
                <h3><span class="badge badge-pill badge-success">Ready Stock <i class="fas fa-check-circle"></i></span></h3>
                @else
                <h3><span class="badge badge-pill badge-danger">Stock Unavailable <i class="fas fa-times-circle"></i></span></h3>
                @endif
                <hr>
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Liga</th>
                                    <th>Jenis</th>
                                    <th>Berat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{url('assets/liga/'.$product->liga->image)}}" alt="" class="img-fluid" width="50">
                                    </td>
                                    <td>{{$product->type}}</td>
                                    <td>{{$product->weight}}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        {{-- QTY --}}
                        <div class="row">
                            <div class="col">
                                <form wire:submit.prevent="addToCart">
                                    <div class="form-group">
                                        <label ><b>Qty :</b></label>
                                        <input type="number" class="form-control w-50 @error('qty') is-invalid @enderror" wire:model="qty" placeholder="Input Qty" value="{{ old('qty') }}" required>
                                        @error('qty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @if ($qty > 1)
                                    
                                    @else
                                    <hr>
                                    <small>Fill if you want to custom jersey (<b>+ Rp. {{number_format($product->price_nameset)}}</b>)</small>
                                    <div class="form-group">
                                        <label ><b>Name set :</b></label><br>
                                        <input type="text" class="form-control w-50 @error('nameset') is-invalid @enderror" wire:model="nameset" placeholder="Input Nameset" value="{{ old('nameset') }}">
                                        @error('nameset')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label ><b>Number set :</b></label>
                                        <input type="number" class="form-control w-50 @error('numberset') is-invalid @enderror" wire:model="numberset" placeholder="Input Numberset" value="{{ old('numberset') }}">
                                        @error('numberset')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    @endif
                                    
                                    @if ($product->available == 1)
                                    <button type="submit" class="btn btn-dark btn-block" style="border-radius: 30px"><i class="fas fa-cart-plus"></i> ADD TO CART</button>   
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
