<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function get() {
        $about = About::first();
        return view('admin.about.add', ['about' => $about]);
    }
    public function post(Request $request) {
        $about = About::first();
        $validator = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'text' => 'required',
            'text_index' => 'required'
        ]);
        $input = $request->all();
        if($file = $request->file('img')) {
            File::delete(public_path().$about->img);
            $namefile = 'about.jpg';
            $file->move('img', $namefile);
            $input['img'] = '/img/'.$namefile;
        }
        $status = $about->fill($input)->save();
        if($status) {
            Session::flash('flash_message', 'Успешно обновлено');
            return redirect()->back();
        }
    }
}
