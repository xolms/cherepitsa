<?php

namespace App\Http\Controllers;

use App\Mail\ContactsMail;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function contacts(Request $request) {
        $validator = $this->validate($request, [
            'name' => 'required',
            'mail' => 'required|email',
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
}
