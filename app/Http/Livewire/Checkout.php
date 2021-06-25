<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $address, $phone, $total_price;

    public function mount()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $this->phone = Auth::user()->phone;
        $this->address = Auth::user()->address;

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (!empty($order)) {
            $this->total_price = $order->total_price + $order->unique_code;
        } else {
            return redirect()->route('home');
        }


    }

    public function checkout()
    {
        $this->validate([
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);

        // Simpan phone dan address ke data user
        $user = User::where('id', Auth::user()->id)->first();
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->update();

        //Update data order
         $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
         $order->status = 1;
         $order->update();

         $this->emit('checkout');

         session()->flash('message', 'Checkout success');

         return redirect()->route('history');


    }

    public function render()
    {
        return view('livewire.checkout')->extends('layouts.app');
    }
}
