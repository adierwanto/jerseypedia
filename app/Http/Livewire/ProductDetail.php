<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{
    public $product, $qty, $nameset, $numberset;

    public function mount($id)
    {
        $productDetail = Product::find($id);

        if ($productDetail) {
            $this->product = $productDetail;
        }
    }

    public function addToCart()
    {
        $this->validate([
            'qty' => 'required|gt:0',
            'nameset' => 'max:10',
            'numberset' => 'max:2'
        ]);

        // Validasi belum login
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        // Menghitung total harga
        if ($this->nameset != null) {
            $total_price = $this->qty * $this->product->price + $this->product->price_nameset;
        } else {
            $total_price = $this->qty*$this->product->price;
        }

        // Cek apakah user punya data pesanan utama
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // Menyimpan / Update Data pesanan utama
        if (empty($order)) {
            Order::create([
                'user_id' => Auth::user()->id,
                'total_price' => $total_price,
                'status' => 0,
                'unique_code' => mt_rand(100, 999),
            ]);

            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $order->order_code = 'JP-'.$order->id;
            $order->update();

        } else {
            $order->total_price = $order->total_price + $total_price;
            $order->update();
        }

        // Menyimpan pesanan detail
        OrderDetail::create([
            'product_id' => $this->product->id,
            'order_id' => $order->id,
            'qty' => $this->qty,
            'nameset' => $this->nameset ? true : false,
            'name' => $this->nameset,
            'number' => $this->numberset,
            'total_price' => $total_price,
        ]);

        $this->emit('addCart');
        session()->flash('message', 'Product has been added to cart');
        return redirect()->back();

    }

    public function render()
    {
        return view('livewire.product-detail')->extends('layouts.app');
    }
}
