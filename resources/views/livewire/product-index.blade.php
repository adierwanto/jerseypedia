<div>
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                      <li class="breadcrumb-item" aria-current="page">Products</li>
                      @if ($title != 'ALL PRODUCTS')
                      <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                      @endif
                    </ol>
                  </nav>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8 mt-2">
                <H3><b>{{$title}}</b></H3>
            </div>
            <div class="col-md-4 mt-2">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                      </div>
                      <input type="text" class="form-control" placeholder="Search products" wire:model="search">
                    </div>
        </div>


        {{-- PRODUCTS --}}
        <div class="row mt-4">
            @foreach ($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card shadow" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <img src="{{ url('assets/jersey/'.$product->image) }}" class="img-fluid" alt="">
                            <br>
                            <b>{{$product->name}}</b>
                            <br>
                            <p>Rp.{{number_format($product->price)}}</p>
                            <a href="{{route('products-detail', $product->id)}}" class="btn btn-primary btn-block"><i class="fas fa-info-circle"></i> Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                {{$products->links()}}
            </div>
        </div>

    </div>

</div>
