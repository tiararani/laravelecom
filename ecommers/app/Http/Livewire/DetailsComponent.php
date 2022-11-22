<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Sale;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Carbon;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;
    public $satt=[];

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price,$this->satt)->associate('App\Models\Product');
        session()->flash('success_massage','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreseQuantity()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get();
        $saleDate = Sale::find(1);
        $dateValidation = $saleDate->status == 1 && $saleDate->sale_date > Carbon::now();
        return view('livewire.details-component', ['product'=>$product, 'popular_products'=>$popular_products, 'related_products'=>$related_products, 'saleDate'=>$saleDate, 'dateValidation'=>$dateValidation])->layout('layouts.base');
    }
}
