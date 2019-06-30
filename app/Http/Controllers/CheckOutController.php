<?php

namespace App\Http\Controllers;

use App\Country;

use App\DeliveryRate;

use App\Mail\PurchaseSuccessful;

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
use Illuminate\Support\Facades\Mail;
use Rave;
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
        $delivery_rate = $this->shippingFee($userinfo);

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
            ->with('userinfo', $userinfo)
            ->with('delivery_rate', $delivery_rate);
    }

    public function shippingFee($userinfo)
    {
        $country = $userinfo->country;
        if ($country == 'Nigeria') {
            return ShippingZone::whereCityId($userinfo->lga)->first()->zone->rate;
        } else {
            if (ShippingZone::whereCountryId(Country::whereCountryName($userinfo->country)->first()->id)->exists())
                return ShippingZone::whereCountryId(Country::whereCountryName($userinfo->country)->first()->id)->first()->zone->rate;
            return 10000;
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
        $request->all();
        $user = Auth::user();
        $userid = Auth::id();
        $delivery_address = $request->delivery_address;
        $country = '';

        Session::put('instruction', $request->instruction);

        if ($delivery_address == 'new') {
            $this->validate($request, [
                'new_address' => 'required',
                'country_id' => 'required',
                'state' => 'required',
                'phone' => 'required'
            ]);
            $country = Country::find($request->country_id);
            $city = $request->city;
            $state_id = $request->state;
            $phone = $request->phone;
            $new_address = $request->new_address;

            $new_userinfo = Userinfo::create([
                'user_id' => $userid,
                'address' => $new_address,
                'city' => $city ?? '',
                'country' => $country->country_name,
                'state_id' => $country->country_name == 'Nigeria' ? State::find($state_id)->state_name : $state_id,
                'phone' => $phone,
                'lga' => $country->country_name == 'Nigeria' ? $request->lga : '',
                'state_alt' => $country->country_name == 'Nigeria' ? State::find($state_id)->state_name : $state_id
            ]);

            $country = $country->country_name;
            $userinfo_id = $new_userinfo->id;
            $userinfo = Userinfo::where('id', $userinfo_id)->get()->first();
        } else {
            $userinfo = Userinfo::where('user_id', $userid)->get()->first();
            $userinfo_id = $userinfo->id;
        }
        $delivery_rate = $request->shipping_fee;
        $discount = $request->discount_fee;
        Session::put('delivery', $delivery_rate);
        Session::put('discount', $discount);

        return view('checkout.docheckout')
            ->with('user', $user)
            ->with('userinfo', $userinfo)
            ->with('discount', $discount)
            ->with('delivery_rate', $delivery_rate);
    }



    public function dotransfer(Request $request)
    {
        // return $request->all();
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
            'discount' => $request->discount ?? 0,
            'order_total' => $request->order_total,
            'shipping_fee' => $request->shipping_fee ?? 0,
            'amount_paid' => $request->order_total,
            'userinfo_id' => $request->userinfo_id,
            'customer_id' => $id,
            'payment_method' => 'bank transfer',
            'order_status' => 'new',
            'currency' => 'NGN',
            'note' => Session::get('instruction')
        ]);

        $order_id = $order->order_id;
        $variants = Session::get('selectedVariant');

        //insert individual order items into order_details table
        foreach (Cart::content() as $cart_itm) {
            $product_id = $cart_itm->id;
            $price = $cart_itm->price;
            $quantity = $cart_itm->qty;

            foreach ($variants as $variant) {
                if ($product_id == $variant['product_id'] && $variant['attributes']) {
                    $product_variant = serialize($variant['attributes']);
                }
            }

            OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'price' => $price,
                'quantity' => $quantity,
                'variants' => $product_variant ?? '',
                'user_id' => $id
            ]);
        }

        //send email to client
        Mail::to(Auth::user())->send(new PurchaseSuccessful($order));

        //reduce the available quantity of products in the store

        Session::forget('selectedVariant');
        Session::forget('instruction');

        //destroy the cart
        Cart::destroy();

        return redirect('user/checkout/transfer/' . $transaction_id);
    }

    public function transfer($transaction_id)
    {
        $user = Auth::user();

        $orders = Order::whereTransactionId($transaction_id)->latest()->first();
        $order_details = OrderDetail::with('products')->whereOrderId($orders->order_id)->get();

        return view('checkout.transfer')
            ->with('orders', $orders)
            ->with('order_details', $order_details)
            ->with('user', $user);
    }

    public function ravepay()
    {
        Rave::initialize(route('ravecallback'));
    }

    public function ravecallback()
    {
        $user = Auth::user();
        $id = Auth::id();
        $userinfo = Userinfo::where('user_id', $id)->first();

        $variants = Session::get('selectedVariant');
        $data = Rave::verifyTransaction(request()->txref);

        if(!$data) {
          //redirec the user to the checkout page and display transaction failed message
            Session::flash('failed', 'An error occurred, please try again later');
            return redirect()->route('checkout.index');
        }
        $chargeResponsecode = $data->data->chargecode;
        $chargeAmount = $data->data->amount;
        $chargeCurrency = $data->data->currency;

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $data->data->meta[5]->metavalue / 100)) {
            foreach ($data->data->meta as $meta) {
                if ($meta->metaname == 'user_id') {
                    $user_id = $meta->metavalue == 'null' ? null : $meta->metavalue;
                }
                if ($meta->metaname == 'transaction_id') {
                    $transaction_id = $meta->metavalue == 'null' ? null : $meta->metavalue;
                }
                if ($meta->metaname == 'cart_total') {
                    $cart_total = $meta->metavalue == 'null' ? null : $meta->metavalue;
                }
                if ($meta->metaname == 'shipping_fee') {
                    $shipping_fee = $meta->metavalue == 'null' ? null : $meta->metavalue;
                }
                if ($meta->metaname == 'discount_fee') {
                    $discount_fee = $meta->metavalue == 'null' ? null : $meta->metavalue;
                }
                if ($meta->metaname == 'userinfo_id') {
                    $userinfo_id = $meta->metavalue == 'null' ? null : $meta->metavalue;
                }
                if ($meta->metaname == 'instructions') {
                    $note = $meta->metavalue == 'null' ? null : $meta->metavalue;
                }
                if ($meta->metaname == 'gt') {
                    $grand_total = $meta->metavalue == 'null' ? null : $meta->metavalue;
                }
            }

            $response = $data->data;
            $amount_paid = $response->amount;
            $currency = $response->currency;
            $fees = $response->appfee;
            $paid_at = $response->created;
            $gateway_resp = $response->chargemessage;
            $trans_ref = $response->txref;
            $order_total = $cart_total + $shipping_fee - $discount_fee;

            if ($amount_paid < $grand_total / 100) {
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
                    'discount' => $discount_fee ?? 0,
                    'order_total' => $order_total,
                    'shipping_fee' => $shipping_fee ?? 0,
                    'amount_paid' => $order_total,
                    'customer_id' => $user_id,
                    'payment_method' => 'rave',
                    'order_status' => 'paid',
                    // 'channel' => $channel,
                    'gateway_resp' => $gateway_resp,
                    'trans_ref' => $trans_ref,
                    'currency' => $currency,
                    'fees' => $fees,
                    'paid_at' => $paid_at,
                    'userinfo_id' => $userinfo_id,
                    'note' => $note
                ]);

                $order_id = $order->order_id;

                //insert individual order items into order_details table
                foreach (Cart::content() as $cart_itm) {
                    $product_id = $cart_itm->id;
                    $price = $cart_itm->price;
                    $quantity = $cart_itm->qty;

                    foreach ($variants as $variant) {
                        if ($product_id == $variant['product_id'] && $variant['attributes']) {
                            $product_variant = serialize($variant['attributes']);
                        }
                    }

                    OrderDetail::create([
                        'order_id' => $order_id,
                        'product_id' => $product_id,
                        'price' => $price,
                        'quantity' => $quantity,
                        'variants' => $product_variant ?? '',
                        'user_id' => $user_id
                    ]);
                }

                //send notification email to the customer
                Mail::to(Auth::user())->send(new PurchaseSuccessful($order));

                //reduce the available quantity of products in the store

                Session::forget('selectedVariant');
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

    public function pay($userinfo_id)
    {
        $transaction_id = MD5(uniqid(rand(), true));
        $transaction_id = substr($transaction_id, 0, 8);

        $user = Auth::user();
        $id = Auth::id();
        $userinfo = Userinfo::where('id', $userinfo_id)->first();

        $state_id = $userinfo->state_id;
        $delivery_rate = Session::get('delivery');
        $discount = Session::get('discount');

        return view('checkout.pay')
            ->with('user', $user)
            ->with('userinfo', $userinfo)
            ->with('delivery_rate', $delivery_rate)
            ->with('discount', $discount)
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

            $discount_fee = $paymentDetails['data']['metadata']['discount_fee'];

            $userinfo_id = $paymentDetails['data']['metadata']['userinfo_id'];

            $variants = $paymentDetails['data']['metadata']['selected_variants'];

            $note = $paymentDetails['data']['metadata']['instructions'];

            $order_total = $cart_total + $shipping_fee - $discount_fee;

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
                    'discount' => $discount_fee ?? 0,
                    'order_total' => $order_total,
                    'shipping_fee' => $shipping_fee ?? 0,
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
                    'userinfo_id' => $userinfo_id,
                    'note' => $note
                ]);

                $order_id = $order->order_id;

                //insert individual order items into order_details table
                foreach (Cart::content() as $cart_itm) {
                    $product_id = $cart_itm->id;
                    $price = $cart_itm->price;
                    $quantity = $cart_itm->qty;

                    foreach ($variants as $variant) {
                        if ($product_id == $variant['product_id'] && $variant['attributes']) {
                            $product_variant = serialize($variant['attributes']);
                        }
                    }

                    OrderDetail::create([
                        'order_id' => $order_id,
                        'product_id' => $product_id,
                        'price' => $price,
                        'quantity' => $quantity,
                        'variants' => $product_variant ?? '',
                        'user_id' => $user_id
                    ]);
                }

                //send notification email to the customer
                Mail::to(Auth::user())->send(new PurchaseSuccessful($order));

                //reduce the available quantity of products in the store

                Session::forget('selectedVariant');
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
