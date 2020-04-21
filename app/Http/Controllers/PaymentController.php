<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

/**
 * Class PaymentController
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    public function index()
    {
        return view('shop.payment');
    }

    public function charge(Request $request)
    {
        if($request->input('stripeToken'))
        {
            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey(env('STRIPE_SECRET_KEY'));

            $token = $request->input('stripeToken');

            $response = $gateway->purchase([
                'amount' => $request->input('amount'),
                'currency' => env('STRIPE_CURRENCY'),
                'token' =>$token,
            ])->send();

            if($response->isSuccessful()){
                //payment was successful: insert transaction data into the database
                $arr_payment_data = $response->getData();
                $isPaymentExist = Payment::query()->where('payment_id', $arr_payment_data['id'])->first();

                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->payer_email = $request->input('email');
                    $payment->amount = $arr_payment_data['amount']/100;
                    $payment->currency = env('STRIPE_CURRENCY');
                    $payment->payment_status=$arr_payment_data['status'];
                    $payment->save();
                }
                return flash("Payment is successful. Your payment id is: ".$arr_payment_data["id"].".");
            } else {
                //payment failed: display message to customer
                return $response->getMessage();
            }
        }
    }

    public function paymentProcess()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
           'amount' => 10000,
           'currency' => 'usd',
           'description' => 'Example charge',
           'source' => $token,
        ]);
    }
}
