<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductDetailColorSize extends Component
{
    public $Product_id = 0;
    public $ProductSizes = [];
    public $ProductColors = [];
    public $ProductSelectSizeId = 0;
    public $ProductSelectColorId = 0;
    public $count = 0;

    public function selectSize($size_id){
        $this->ProductSelectSizeId = $size_id;
        dd($this->ProductSelectColorId,$this->ProductSelectSizeId);
//        $this->addMakeSelectionEvent();
    }

    public function selectColor($color_id){
        $this->ProductSelectColorId = $color_id;
    }

    public function render()
    {
        return view('livewire.product-detail-color-size');
    }



    public function addMakeSelectionEvent(){
        if ($this->ProductSelectSizeId != 0 && $this->ProductSelectColorId != 0){
            $this->emit('getPriceDiscount');
        }
    }
}
