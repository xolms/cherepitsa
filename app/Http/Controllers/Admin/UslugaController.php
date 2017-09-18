<?php

namespace App\Http\Controllers\Admin;

use App\Usluga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class UslugaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usluga = Usluga::all();
        return view('admin.usluga.index',['usluga' => $usluga]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usluga.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $alias = $this->tourl($this->translite($request->alias));
        $request->alias = $alias;
        if(empty($request->title)) {
            $request->title = $request->name;
        }
        $this->validate($request, [
            'alias' => 'required|unique:uslugas,alias|min:6|max:80',
            'name' => 'required',
            'title' => 'required|max:80',
            'description' => 'required|max:300',
            'small_text' => 'required|max:50|min:20',
            'text' => 'required',
            'bg' => 'required|image'
        ]);
        $input = $request->all();
        $input['alias'] = $this->tourl($this->translite($request->alias));
        if($file = $request->file('bg')) {
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/usluga', $namefile);
            $input['bg'] = '/img/usluga/'.$namefile;
        }
        $status = Usluga::create($input);
        if ($status) {
            Session::flash('flash_message', 'Услуга успешно добавлена');
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
        $usluga = Usluga::findOrFail($id);
        return view('admin.usluga.edit', ['usluga' => $usluga]);

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

        $usluga = Usluga::findOrFail($id);
        $alias = $this->tourl($this->translite($request->alias));

        if ($alias != $usluga->alias) {
            $empty = Usluga::where('alias', $alias)->first();
            if (isset($empty)) {
                Session::flash('error', 'Такой alias уже занят');
                return redirect()->back()->withInput();
            }
        }
        $this->validate($request, [
            'alias' => 'required|min:2|max:80',
            'name' => 'required',
            'title' => 'required|max:80',
            'description' => 'required|max:300',
            'small_text' => 'required|max:50|min:20',
            'text' => 'required',
            'bg' => 'image'
        ]);
        $input = $request->all();
        $input['alias'] = $this->tourl($this->translite($request->alias));
        if($file = $request->file('bg')) {
            if($file = $request->file('bg')) {
                File::delete(public_path().$usluga->bg);
                $namefile = time() . $file->getClientOriginalName();
                $file->move('img/usluga', $namefile);
                $input['bg'] = '/img/usluga/'.$namefile;
            }
        }
        $status = $usluga->fill($input)->save();
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
        $usluga = Usluga::findOrFail($id);
        File::delete(public_path().$usluga->bg);
        $status = $usluga->delete();
        if($status) {
            Session::flash('flash_message','Успешно удалено');
            return redirect()->back();
        }
    }
}
