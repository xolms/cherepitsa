<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }
    public function clear() {
            Cache::flush();
            Session::flash('flash_message', 'Кеш успешно удален');
            return redirect()->back();

    }
}
