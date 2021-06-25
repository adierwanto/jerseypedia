<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{   
    protected $order;
    protected $order_details = [];

    public function destroy($id)
    {
        $order_detail = OrderDetail::find($id);
        if (!empty($order_detail)) {
            $order = Order::where('id', $order_detail->order_id)->first();
            $order_detail_qty = OrderDetail::where('order_id', $order->id)->count();

            if ($order_detail_qty == 1) {
                $order->delete();
            } else {
                $order->total_price = $order->total_price - $order_detail->total_price;
                $order->update();
            }

            $order_detail->delete();
            $this->emit('deleteCart');
            session()->flash('message', 'Item removed from cart');
        }
    }

    public function render()
    {   
        if (Auth::user()) {
            $this->order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

            if ($this->order) {
                $this->order_details = OrderDetail::where('order_id', $this->order->id)->get();
            }
        }

        return view('livewire.cart', [
            'order' => $this->order,
            'order_details' => $this->order_details,
        ])->extends('layouts.app');
    }
}
