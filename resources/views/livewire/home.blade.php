<div>
    <div class="container">
        
        {{-- BANNER --}}
        <div class="banner">
            <img src="{{ url('assets/slider1.png') }}" class="img-fluid my-4" alt="" style="border-radius: 15px">
        </div>
        
        {{-- LEAGUE --}}
        <h3>LEAGUE</h3>
        <div class="row my-5">
            @foreach ($ligas as $liga)
                <div class="col">
                    <a href="{{ route('products-liga', $liga->id) }}">
                        <div class="card shadow" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <img src="{{ url('assets/liga/'.$liga->image) }}" class="img-fluid" alt="" style="max-height: 100px">
                            </div>
                        </div>
                    </a>
                    
                </div>
            @endforeach
        </div>


        {{-- PRODUCTS --}}
        <h3>PRODUCTS</h3>
        <div class="row mt-4">
            @foreach ($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card shadow" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <img src="{{ url('assets/jersey/'.$product->image) }}" class="img-fluid" alt="" style="max-height: 200px">
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
        <br>
        <div class="row">
            <div class="col text-center">
                <a href="{{route('products')}}" class="btn btn-primary btn-lg">See more >></a>
            </div>
        </div>
        
    </div>
</div>
