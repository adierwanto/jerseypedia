<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class History extends Component
{
    public $orders;

    public function render()
    {   
        if (Auth::user()) {
            $this->orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
        }
        
        return view('livewire.history')->extends('layouts.app');
    }
}
