<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Exception;

class SmsController extends Controller
{
    
    public function send(Request $request) {

        $receiver_number    =  explode(",",$request->mobile_number);
        $message            =  $request->message;


        //dd($receiver_number);

        $account_sid    = getenv("TWILIO_SID");
        $auth_token     = getenv("TWILIO_TOKEN");
        $twilio_number  = getenv("TWILIO_FROM");

        //dd($twilio_number);


        try{

            if(count($receiver_number) > 0) {

                $success = false;
                foreach($receiver_number as $mobVal) {
                    //dd($mobVal);
                    $client     =   new Client($account_sid, $auth_token);
                    $getDetails =   $client->messages->create($mobVal,[
                                        'from'  => $twilio_number,
                                        'body'  => $message
                                    ]);

                    //print_r($getDetails->sid);

                    if($getDetails->sid){

                        $success = true;

                    }
                }

                if($success){
                    return redirect()->back()->with('message', 'Message Sent Successfully');
                } else {
                    return "something went wrong";
                }
            }
        } catch (Exception $e) {
            return  "something wrong";
        }
    }

    

    public function sendSmsView(Request $request) {

        return view('smsView');

    }
}
