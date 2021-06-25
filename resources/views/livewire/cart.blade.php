<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
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
        <h3><b>CART</b></h3>
        
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Custom Set</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th><strong>Total Price</strong></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order_details as $key => $order_detail)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>
                                    <img src="{{url('assets/jersey/'.$order_detail->product->image)}}" width="100" height="100">
                                </td>
                                <td>{{$order_detail->product->name}}</td>
                                <td>
                                    @if ($order_detail->nameset == true)
                                        {{$order_detail->name}} {{'('.$order_detail->number.')'}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{$order_detail->qty}}</td>
                                <td>Rp. {{number_format($order_detail->product->price)}}</td>
                                <td>Rp. {{number_format($order_detail->total_price)}}</td>
                                <td>
                                    <i wire:click="destroy({{$order_detail->id}})" class="fas fa-times"></i>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8"><h3><b>EMPTY</b></h3></td>
                            </tr>
                            @endforelse
                            @if (!empty($order))

                            <tr>
                                <td colspan="6" align="right"><strong>TOTAL</strong></td>
                                <td colspan="2"><strong>Rp. {{number_format($order->total_price)}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"><strong>UNIQUE CODE</strong></td>
                                <td colspan="2"><strong>Rp. {{number_format($order->unique_code)}}</td>
                            </tr>
                            <tr class="table-info">
                                <td colspan="6" align="right"><strong>GRAND TOTAL</strong></td>
                                <td colspan="2"><strong>Rp. {{number_format($order->total_price + $order->unique_code)}}</td>
                            </tr>
                            <tr>
                                <td colspan="8" align="right"><a href="{{route('checkout')}}" class="btn btn-success float-right">Checkout <i class="fas fa-arrow-right"></i> </a></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
        
    </div>
</div>
</div>
