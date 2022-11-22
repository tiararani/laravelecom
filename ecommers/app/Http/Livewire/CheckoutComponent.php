<?php

namespace App\Http\Livewire;

use Cart;
use Stripe;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\Country;
use Livewire\Component;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Expedition;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{
    public $shipDifferentAddress;

    public $firstname;
    public $lastname;
    public $email;
    public $line1;
    public $line2;
    public $mobile;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $ship_firstname;
    public $ship_lastname;
    public $ship_email;
    public $ship_line1;
    public $ship_line2;
    public $ship_mobile;
    public $ship_city;
    public $ship_province;
    public $ship_country;
    public $ship_zipcode;

    public $payMethod;
    public $thankyou;

    public $cardNo;
    public $expMonth;
    public $expYear;
    public $cvc;

    public $select_expedition;
    public $shipping_charge;


    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'line1'=>'required',
            'mobile'=>'required',
            'city'=>'required',
            'province'=>'required',
            'country'=>'required',
            'zipcode'=>'required',
            'payMethod'=>'required',
            'select_expedition' => 'required'
        ]);

        if ($this->shipDifferentAddress)
        {
            $this->validateOnly($fields, [
                'ship_firstname'=>'required',
                'ship_lastname'=>'required',
                'ship_email'=>'required',
                'ship_line1'=>'required',
                'ship_mobile'=>'required',
                'ship_city'=>'required',
                'ship_province'=>'required',
                'ship_country'=>'required',
                'ship_zipcode'=>'required'
            ]);
        }

        if ($this->payMethod == 'card') 
        {
            $this->validateOnly($fields,[
                'cardNo'=>'required | numeric',
                'expMonth'=>'required | numeric',
                'expYear'=>'required | numeric',
                'cvc'=>'required | numeric'
            ]);
        }
    }

    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order_id;
            $transaction->mode = $this->payMethod;
            $transaction->status = $status;
            $transaction->save();
    }

    public function setShippingCharge(){
        
        if (isset($this->country)) {
            $country_l = Country::where('distance', $this->country)->first()->distance;
            $price_km = Expedition::where('price_km', $this->select_expedition)->first()->price_km;
            $this->shipping_charge = $price_km * $country_l;

        } else {
            session()->flash('msg', 'Select the country first!');
        }
        
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');

        } else if ($this->thankyou) {
            return redirect()->route('thankyou');

        } else if (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'line1'=>'required',
            'mobile'=>'required',
            'city'=>'required',
            'province'=>'required',
            'country'=>'required',
            'zipcode'=>'required',
            'payMethod'=>'required'
        ]);

        $selected_country = Country::where('distance', $this->country)->first()->country;
        $exp_id = Expedition::where('price_km', $this->select_expedition)->first()->id;
        $exp_agent = Expedition::where('price_km', $this->select_expedition)->first()->name;
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total']+$this->shipping_charge;
        $order->firstname  = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->mobile = $this->mobile;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->shipDifferentAddress ? 1:0; 
        $order->expedition_id = $exp_id;
        $order->shipping_charge = $this->shipping_charge;
        $order->save();
        
        foreach (Cart::instance('cart')->content() as $item) 
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->user_id = Auth::user()->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            if($item->options)
            {
                $orderItem->options = serialize($item->options);
            }
            $orderItem->save();
        }

        if ($this->shipDifferentAddress) {
            $this->validate([
                'ship_firstname'=>'required',
                'ship_lastname'=>'required',
                'ship_email'=>'required',
                'ship_line1'=>'required',
                'ship_mobile'=>'required',
                'ship_city'=>'required',
                'ship_province'=>'required',
                'ship_country'=>'required',
                'ship_zipcode'=>'required'
            ]);

        if ($this->payMethod == 'card') 
        {
            $this->validate([
                'cardNo'=>'required | numeric',
                'expMonth'=>'required | numeric',
                'expYear'=>'required | numeric',
                'cvc'=>'required | numeric'
            ]);
        }
    
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname  = $this->ship_firstname;
            $shipping->lastname = $this->ship_lastname;
            $shipping->email = $this->ship_email;
            $shipping->line1 = $this->ship_line1;
            $shipping->line2 = $this->ship_line2;
            $shipping->mobile = $this->ship_mobile;
            $shipping->city = $this->ship_city;
            $shipping->province = $this->ship_province;
            $shipping->country = $this->ship_country;
            $shipping->zipcode = $this->ship_zipcode;
            $shipping->save();
            
        }

        if ($this->payMethod == 'cod') {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();

        } else if ($this->payMethod == 'card'){
            $stripe = Stripe::make(env('STRIPE_KEY'));

            try {
                $token = $stripe->tokens()->create([
                    'card'=>[
                        'number'=>$this->cardNo,
                        'exp_month'=>$this->expMonth,
                        'exp_year'=>$this->expYear,
                        'cvc'=>$this->cvc
                    ]
                ]);

                if (!isset($token['id'])) {
                    session()->flash('stripe_error','The stripe token was not generated correctly!');
                    $this->thankyou = 0;

                }

                $customer = $stripe->customers()->create([
                    'name'=>$this->firstname.' '.$this->lastname,
                    'email'=>$this->email,
                    'phone'=>$this->mobile,
                    'address'=>[
                        'line1'=>$this->line1,
                        'postal_code'=>$this->zipcode,
                        'city'=>$this->city,
                        'state'=>$this->province,
                        'country'=>$this->country
                    ],
                    'shipping'=>[
                        'name'=>$this->firstname.' '.$this->lastname,
                        'address'=>[
                            'line1'=>$this->line1,
                            'postal_code'=>$this->zipcode,
                            'city'=>$this->city,
                            'state'=>$this->province,
                            'country'=>$this->country
                        ],
                    ],
                    'source'=>$token['id']
                ]);

                $charge = $stripe->charges()->create([
                    'customer'=>$customer['id'],
                    'currency'=>'USD',
                    'amount'=>session()->get('checkout')['total'],
                    'description'=>'Payment for order no '.$order->id
                ]);

                if ($charge['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();

                } else {
                    session()->flash('stripe_error', 'Error in transactions!');
                    $this->thankyou = 0;
                }

            } catch (Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->thankyou = 0;
            }
        }

        $this->sendOrderConfirmationMail($order);
    }

    // //shippingcharge=
    // public function shoppingcharge(){
    //     return (float) str_replace(',' , '',  Cart::instance('cart')->subtotal());
    // }

    // //shippingcharge=
    // public function totalcharge(){
    //     return (float) str_replace(',' , '',  Cart::instance('cart')->total());
    // }

    public function render()
    {
        // //shippingcharge=
        // $shippingcharge = $this->shoppingcharge() * 5/100;
        // $totalcharge = $this->totalcharge() + $shippingcharge;

        $this->verifyForCheckout();
        return view('livewire.checkout-component',['countries'=>Country::all(), 'expeditions'=>Expedition::all()])->layout('layouts.base');
    }
}