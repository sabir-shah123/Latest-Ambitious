<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request,$orderid=null){
        
        if(is_null($orderid)){
            request()->session()->flash('error', 'Order not found');
        }else{
            $order = Order::where('uuid',$orderid)->first();
            $payment_method = $order->payment_method;
            if($payment_method == 'paypal'){
                return redirect()->route('paypal.payment',$orderid);
            }elseif($payment_method == 'stripe'){
                return redirect()->route('stripe.payment',$orderid);
            }elseif($payment_method == 'razorpay'){
                return redirect()->route('razorpay.payment',$orderid);
            }elseif($payment_method == 'code'){
                return redirect()->route('instamojo.payment',$orderid);
            }else{
                request()->session()->flash('error', 'Payment method not found');
            }
        }
    }
}
