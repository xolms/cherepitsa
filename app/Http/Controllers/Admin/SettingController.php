<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::all();
        return view('admin.setting.index', ['setting' => $setting]);
    }
    public function create() {
        return view('admin.setting.add');
    }
    public function store(Request $request) {
        $this->validate($request, [
            'name_rus' => 'required|max:60',
            'value' => 'required|max:300',
        ]);
        $input = $request->all();
        $input['name'] = $this->tourl($this->translite($request->name_rus));
        $status = Setting::create($input);
        if ($status) {
            Session::flash('flash_message', 'Настройка успешно добавлена');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.setting.edit', ['setting' => $setting]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $this->validate($request, [
            'value' => 'required|max:300',
        ]);
        $input = $request->all();
        $status = $setting->fill($input)->save();
        if($status) {
            Session::flash('flash_message', 'Успешно обновлено');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
