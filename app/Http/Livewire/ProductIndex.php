<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->paginate(8);
        } else {
           $products = Product::paginate(9); 
        }

        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'ALL PRODUCTS'
        ])->extends('layouts.app');
    }
}
