<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index', ['slider' => $slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->alias)) {
            $alias = $this->tourl($this->translite($request->alias));
            $request->alias = $alias;
        }

        $this->validate($request, [
            'title' => 'required|max:60',

            'bg' => 'required|image'
        ]);

        $input = $request->all();
        if($file = $request->file('bg')) {
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/slider', $namefile);
            $input['bg'] = '/img/slider/'.$namefile;
        }
        $status = Slider::create($input);
        if ($status) {
            Session::flash('flash_message', 'Слайдер успешно добавлен');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', ['slider' => $slider]);
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
        $slider = Slider::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:60',
        ]);

        $input = $request->all();
        $input['alias'] = $this->tourl($this->translite($request->alias));
        if($file = $request->file('bg')) {
            File::delete(public_path().$slider->bg);
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/slider', $namefile);
            $input['bg'] = '/img/slider/'.$namefile;
        }
        $status = $slider->fill($input)->save();
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
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        File::delete(public_path().$slider->bg);
        $status = $slider->delete();
        if($status) {
            Session::flash('flash_message','Успешно удалено');
            return redirect()->back();
        }
    }
}
