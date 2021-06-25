<?php

namespace App\Http\Livewire;

use App\Models\Liga;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $count = 0;
    
    protected $listeners = [
        'addCart' => 'updateCart',
        'deleteCart' => 'updateCart',
        'checkout' => 'updateCart',
    ];
    
    public function updateCart()
    {
        if (Auth::user()) {
            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($order) {
                $this->count = OrderDetail::where('order_id', $order->id)->count();
            } else {
                $this->count = 0;
            }
        }
    }
    
    public function mount()
    {   
        if (Auth::user()) {
            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($order) {
                $this->count = OrderDetail::where('order_id', $order->id)->count();
            } else {
                $this->count = 0;
            }
        }
    }
    
    
    public function render()
    {
        return view('livewire.navbar', [
            'ligas' => Liga::all(),
            'count' => $this->count,
        ]);
    }
}
