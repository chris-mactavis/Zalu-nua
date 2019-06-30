<?php

namespace App\Http\Controllers;

use App\Country;

use App\DeliveryRate;

use App\Order;

use App\OrderDetail;

use App\Product;

use App\ShippingZone;

use App\State;

use App\User;

use App\Userinfo;

use Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Paystack;
use Session;

class CheckOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view('checkout.index')
            ->with('user', $user);
    }

    public function delivery()
    {
        $user = Auth::user();
        $id = Auth::id();
        $userinfo = Userinfo::where('user_id', $id)->first();

        $lga = ShippingZone::with('city')->where('city_id', '>', 0)->get();
        $states = [];
        foreach ($lga as $l) {
            if ($l->city) {
                $states[] = State::find($l->city->state_code);
            }
        }
        
        $sorted = collect($states)->sortBy('state_name');
        $states = $sorted->values()->all();

        $countries = ShippingZone::with('country')->where('country_id', '>', 0)->get();

        return view('checkout.delivery')
            ->with('user', $user)
            ->with('lgas', $lga)
            ->with('states', array_unique($states))
            ->with('countries', $countries)
            ->with('userinfo', $userinfo);
    }

    public function shippingFee($userinfo)
    {
        $country = $userinfo->country;
        if ($country == 'Nigeria') {
            return ShippingZone::whereCityId($userinfo->lga)->first()->zone->rate;
        } else {
            return ShippingZone::whereCountryId(Country::whereCountryName($userinfo->country)->id)->first()->zone->rate;
        }
    }


    public function getDeliveryRate($state_id)
    {
        $delivery_rate = DeliveryRate::where('state_id', $state_id)->get()->first();

        if ($delivery_rate !== null) {
            return $delivery_rate->rate;
        } else {
            $delivery_rate = 2500;
            return $delivery_rate;
        }
    }



    public function docheckout(Request $request)
    {
        // return $request->all();
        $user = Auth::user();
        $userid = Auth::id();
        $delivery_address = $request->delivery_address;
        $country = '';

        //$userinfo = Userinfo::where('user_id',$id)->first();

        if ($delivery_address == 'new') {
            $country = Country::find($request->country_id);
            $city = $request->city;
            $state_id = $request->state;
            $phone = $request->phone;
            $new_address = $request->new_address;

            $new_userinfo = Userinfo::create([
                'user_id' => $userid,
                'address' => $new_address,
                'city' => $city,
                'country' => $country->country_name,
                'state_id' => $state_id,
                'lga' => $request->lga,
                'phone' => $phone
            ]);
            $country = $country->country_name;
            $userinfo_id = $new_userinfo->id;
            $userinfo = Userinfo::where('id', $userinfo_id)->get()->first();
        } else {
            $userinfo = Userinfo::where('user_id', $userid)->get()->first();
            $userinfo_id = $userinfo->id;
        }
        $delivery_rate = $request->shipping_fee;
        // $state_id = $userinfo->state_id;
        // $delivery_rate = $this->getDeliveryRate($state_id);

        return view('checkout.docheckout')
            ->with('user', $user)
            ->with('userinfo', $userinfo)
            ->with('delivery_rate', $delivery_rate);
    }



    public function dotransfer(Request $request)
    {
        //Cart::store($user_id);

        $transaction_id = MD5(uniqid(rand(), true));
        $transaction_id = substr($transaction_id, 0, 8);

        $user = Auth::user();
        $id = Auth::id();
        $userinfo = Userinfo::where('user_id', $id)->first();

        //get data from the form and insert the details into the orders table
        $order = Order::create([
            'transaction_id' => $transaction_id,
            'cart_total' => $request->cart_total,
            'discount' => $request->discount,
            'order_total' => $request->order_total,
            'shipping_fee' => $request->shipping_fee,
            'amount_paid' => $request->order_total,
            'userinfo_id' => $request->userinfo_id,
            'customer_id' => $id,
            'payment_method' => 'bank transfer',
            'order_status' => 'new',
            'currency' => 'NGN',
        ]);

        $order_id = $order->order_id;

        //insert individual order items into order_details table
        foreach (Cart::content() as $cart_itm) {
            $product_id = $cart_itm->id;
            $price = $cart_itm->price;
            $quantity = $cart_itm->qty;

            $order_details = OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'price' => $price,
                'quantity' => $quantity,
            ]);
        }

        //send email to client

        //reduce the available quantity of products in the store


        //destroy the cart
        Cart::destroy();

        return redirect()->route('checkout.transfer', ['transaction_id' => $transaction_id]);
    }

    public function transfer()
    {

        $user = Auth::user();
        $id = Auth::id();
        //$userinfo = Userinfo::where('user_id',$id)->first();

        return view('checkout.transfer')
            ->with('user', $user);
        //->with('userinfo', $userinfo);  

    }


    public function pay($userinfo_id)
    {
        //Cart::store($user_id);
        $transaction_id = MD5(uniqid(rand(), true));
        $transaction_id = substr($transaction_id, 0, 8);

        $user = Auth::user();
        $id = Auth::id();
        $userinfo = Userinfo::where('id', $userinfo_id)->first();

        $state_id = $userinfo->state_id;
        // $delivery_rate = $this->getDeliveryRate($state_id);
        $delivery_rate = $this->shippingFee($userinfo);

        return view('checkout.pay')
            ->with('user', $user)
            ->with('userinfo', $userinfo)
            ->with('delivery_rate', $delivery_rate)
            ->with('transaction_id', $transaction_id);
    }


    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback()
    {
        $user = Auth::user();
        $id = Auth::id();
        $userinfo = Userinfo::where('user_id', $id)->first();

        $paymentDetails = Paystack::getPaymentData();

        //dd($paymentDetails);

        //if payment is successful
        //extract the data from the paymentDetails

        $status = $paymentDetails['data']['status'];

        if ($status == 'success') {
            // return $paymentDetails;
            $channel = $paymentDetails['data']['channel'];

            $amount_paid = $paymentDetails['data']['amount'];

            $currency = $paymentDetails['data']['currency'];

            $fees = $paymentDetails['data']['fees'];

            $paid_at = $paymentDetails['data']['paidAt'];

            $gateway_resp = $paymentDetails['data']['gateway_response'];

            $trans_ref = $paymentDetails['data']['reference'];

            $user_id = $paymentDetails['data']['metadata']['user_id'];

            $transaction_id = $paymentDetails['data']['metadata']['transaction_id'];

            $cart_total = $paymentDetails['data']['metadata']['cart_total'];

            $shipping_fee = $paymentDetails['data']['metadata']['shipping_fee'];
            $userinfo_id = $paymentDetails['data']['metadata']['userinfo_id'];
            $variants = $paymentDetails['data']['metadata'][ 'selected_variants'];

            $order_total = $cart_total + $shipping_fee;

            $grand_total = $paymentDetails['data']['metadata']['gt'];

            //verify that amount paid is the correct amount

            if ($amount_paid < $grand_total) {
                //the amount paid is less than the expected amount
                //redirec the user to the checkou page and display transaction failed message
                Session::flash('failed', 'The amount paid does not tally with the total amount expected');
                return redirect()->route('checkout.index');
            } else {
                //the amount paid is the correct amount
                //insert the payment details into the orders table
                $order = Order::create([
                    'transaction_id' => $transaction_id,
                    'cart_total' => $cart_total,
                    'discount' => 0,
                    'order_total' => $order_total,
                    'shipping_fee' => $shipping_fee,
                    'amount_paid' => $order_total,
                    'customer_id' => $user_id,
                    'payment_method' => 'paystack',
                    'order_status' => 'paid',
                    'channel' => $channel,
                    'gateway_resp' => $gateway_resp,
                    'trans_ref' => $trans_ref,
                    'currency' => $currency,
                    'fees' => $fees,
                    'paid_at' => $paid_at,
                    'userinfo_id' => $userinfo_id
                ]);

                $order_id = $order->order_id;

                //insert individual order items into order_details table
                foreach (Cart::content() as $cart_itm) {
                    $product_id = $cart_itm->id;
                    $price = $cart_itm->price;
                    $quantity = $cart_itm->qty;

                    foreach($)

                    $order_details = OrderDetail::create([
                        'order_id' => $order_id,
                        'product_id' => $product_id,
                        'price' => $price,
                        'quantity' => $quantity,
                        // 'variant' => 
                    ]);
                }


                //send notification email to the customer


                //reduce the available quantity of products in the store


                //destroy the cart
                Cart::destroy();

                //redirect the user to the thank you page
                return redirect()->route('checkout.thankyou', ['transaction_id' => $transaction_id]);
            }
        } else {
            //else if payment failed
            //redirec the user to the checkout page and display transaction failed message
            Session::flash('failed', 'An error occurred, please try again later');
            return redirect()->route('checkout.index');
        }
    }


    public function thankyou()
    {
        return view('checkout.thankyou');
    }
}
