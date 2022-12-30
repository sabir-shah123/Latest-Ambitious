<?php

use App\Models\ExtraSetting;
use App\Models\Order;
use App\Models\Settings;

function uploadFile($file, $path, $name)
{
    $name = $name . '.' . $file->getClientOriginalExtension();
    $file->move($path, $name);
    return $path . '/' . $name;
}

function currency_sym()
{
    return setting('currency_symbol', 1, '$');
}

function setting($key, $id = 1, $default = null)
{
    $setting = ExtraSetting::where('user_id', $id)->whereName($key)->first();
    if ($setting) {
        return $setting->value;
    }
    return $default;
}

function dbsetting($key, $default = null)
{
    $setting = Settings::firstOrFail();
    if ($setting) {
        return $setting->$key;
    }
    return $default;
}

function checkOrderNumber($orderNumber)
{
    $order = Order::where('order_number', $orderNumber)->first();
    if ($order) {
        return true;
    }
    return false;
}

function chargeStripe($request)
{
    // Your Secret Id
    if ($request->total_amount && $request->total_amount <= 0) {
        return response()->json(false);
    }

    $secret = 'sk_test_51LeviEEKjRrlgJDgs68PdeTz89ECOBBcWazTJeBRVyDUWgmxizRfp3lHa6gdJs67A6QbkIP75B5seIQT3ubBES0700qclkWRVe';

    $stripe = new \Stripe\StripeClient($secret);

    // First check customer is exsist or not

    $customers = $stripe->customers->search([
        'query' => 'email:\'' . $request->email . '\'',
    ]);

   

    $customer = null;
    foreach ($customers->data as $cust) {
        $customer = $cust;
    }
    

    $amount = $request->total_amount ?? 0;
    if ($customer == null) {
        //create customer
        $customer = $stripe->customers->create([
            'name' => $request->name,
            'email' => $request->email,
            'source' => $request->stripe_token,
        ]);
    } else {

        $stripe->customers->update(
            $customer->id,
            [
                'source' => $request->stripe_token,
            ]
        );
    }

    $charge = $stripe->charges->create([
        'amount' => $amount * 100, //20*100
        'currency' => 'usd',
        'customer' => $customer->id,
        'description' => 'Payment for order',
    ]);

    if ($charge->captured) {
        $res = [
            'status' => 'true',
            'message' => 'Payment Successfull, Thank you for your order'
        ];
    } else {
        $res = [
            'status' => 'error',
            'message' => 'Payment Failed . ' . $charge->failure_message
        ];
    }
    //   THIS IS RESPOse WE ARE SENDING BACK TO AJAX CALL 
    return $res;
}
