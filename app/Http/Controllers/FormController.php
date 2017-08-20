<?php

namespace App\Http\Controllers;

use App\Mail\ContactsMail;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function contacts(Request $request) {
        if (empty($request->phone) && empty($request->mail) ) {
            return response()->json(['message' => 'empty data'], '422');
        }
        $validator = $this->validate($request, [
            'name' => 'required',
            'mail' => 'email',
            'message' => 'required',
            'phone' => 'required'
        ]);
        $setting = Setting::where('name', 'e-mail')->first();
        $carbon = Carbon::now();
        \Mail::send('mail.contact', ['setting' => $setting, 'data' => $request, 'time' => $carbon], function($message) use ($setting){
            $message->from('onekartel@ya.ru', 'Новая заявка с формы обратной связи');
            $message->to($setting->value);
            $message->subject('Новая заявка с формы обратной связи');

        });
        return response()->json(['status' => 'good'] , '200');

    }
    public function zamer(Request $request) {
        if (empty($request->phone) && empty($request->mail) ) {
            return response()->json(['message' => 'empty data'], '422');
        }
        $validator = $this->validate($request, [
            'name' => 'required',
            'mail' => 'email',
        ]);
        $setting = Setting::where('name', 'e-mail')->first();
        $carbon = Carbon::now();
        \Mail::send('mail.contact', ['setting' => $setting, 'data' => $request, 'time' => $carbon], function($message) use ($setting){
            $message->from('onekartel@ya.ru', 'Новая заявка на замер');
            $message->to($setting->value);
            $message->subject('Новая заявка на замер');

        });
        return response()->json(['status' => 'good'] , '200');
    }
    public function usluga(Request $request) {
        if (empty($request->phone) && empty($request->mail) ) {
            return response()->json(['message' => 'empty data'], '422');
        }
        $validator = $this->validate($request, [
            'name' => 'required',
            'mail' => 'email',
        ]);
        $setting = Setting::where('name', 'e-mail')->first();
        $carbon = Carbon::now();
        \Mail::send('mail.contact', ['setting' => $setting, 'data' => $request, 'time' => $carbon], function($message) use ($setting){
            $message->from('onekartel@ya.ru', 'Новая заявка на услугу');
            $message->to($setting->value);
            $message->subject('Новая заявка на услугу');

        });
        return response()->json(['status' => 'good'] , '200');
    }
    public function buy(Request $request) {
        if (empty($request->phone) && empty($request->mail) ) {
            return response()->json(['message' => 'empty data'], '422');
        }
        $validator = $this->validate($request, [
            'name' => 'required',
            'mail' => 'email',
        ]);
        $setting = Setting::where('name', 'e-mail')->first();
        $carbon = Carbon::now();
        \Mail::send('mail.contact', ['setting' => $setting, 'data' => $request, 'time' => $carbon], function($message) use ($setting){
            $message->from('onekartel@ya.ru', 'Новая заявка на покупку');
            $message->to($setting->value);
            $message->subject('Новая заявка на покупку');

        });
        return response()->json(['status' => 'good'] , '200');
    }

}
