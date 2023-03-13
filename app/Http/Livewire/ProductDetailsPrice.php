<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductDetailsPrice extends Component
{
    public $price = 0;
    public $discountPrice = 0;

    protected $listeners = ['getPriceDiscount' => 'changePrice'];

    public function render()
    {
        return view('livewire.product-details-price');
    }

    public function changePrice(){
        dd("hello change price");
    }
}
