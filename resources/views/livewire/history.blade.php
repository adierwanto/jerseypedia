<div>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">History</li>
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
        
        <br>
        <h3><b>HISTORY</b></h3>
        
        <div class="row">
            <div class="col">
                <div class="table-responsive table-bordered">
                    
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Order Code</th>
                                <th>Items</th>
                                <th>Status</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->order_code}}</td>
                                <td align="left">
                                    @foreach ($order->order_details as $item)
                                    <img src="{{url('assets/jersey/'.$item->product->image)}}" width="50">
                                    {{$item->product->name}}
                                    <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($order->status == 1)
                                    <span class="badge badge-warning">Unpaid</span>
                                    @elseif ($order->status == 2)
                                    <span class="badge badge-success">Paid</span>
                                    @endif
                                </td>
                                <td>Rp. {{number_format($order->total_price)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center"><b>Payment Information</b></h4>
                        <hr>
                        <p>For payment, please transfer the amount </p>
                        <div class="media">
                            <img class="mr-3" src="{{url('assets/bri.png')}}" width="70px">
                            <div class="media-body">
                                <h5 class="mt-0">BANK BRI</h5>
                                2231231232 <strong>(Damien)</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </div>
</div>
</div>
