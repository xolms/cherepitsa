<?php

namespace App\Http\Controllers\Admin;

use App\Usluga;
use App\Works;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Works::all();
        return view('admin.works.index', ['works' => $works]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usluga = Usluga::select('name', 'id')->get();
        return view('admin.works.add', ['usluga' => $usluga]);
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
        $empty = Works::where('alias', $alias)->first();
        if (isset($empty)) {
            Session::flash('error', 'Такой alias уже занят');
            return redirect()->back()->withInput();
        }
        $this->validate($request, [
            'alias' => 'required|unique:works,alias|min:6|max:80',
            'title' => 'required|max:80',
            'description' => 'required|max:300',
            'text' => 'required',
            'img' => 'required|image',
            'usluga_id' => 'required',
            'name' => 'required'
        ]);
        $input = $request->all();
        $input['alias'] = $this->tourl($this->translite($request->alias));
        if($file = $request->file('img')) {
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/works', $namefile);
            $input['img'] = '/img/works/'.$namefile;
        }
        $status = Works::create($input);
        if ($status) {
            Session::flash('flash_message', 'Работа успешно добавлена');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $works = Works::findOrFail($id);
        $usluga = Usluga::select('name', 'id')->get();
        return view('admin.works.edit', ['works' => $works, 'usluga' => $usluga]);
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
        $works = Works::findOrFail($id);
        $alias = $this->tourl($this->translite($request->alias));

        if ($alias != $works->alias) {
            $empty = Works::where('alias', $alias)->first();
            if (isset($empty)) {
                Session::flash('error', 'Такой alias уже занят');
                return redirect()->back()->withInput();
            }
        }
        $this->validate($request, [
            'alias' => 'required|min:6|max:80',
            'title' => 'required|max:80',
            'description' => 'required|max:300',
            'text' => 'required',
            'img' => 'image',
            'name' => 'required'
        ]);
        $input = $request->all();
        $input['alias'] = $this->tourl($this->translite($request->alias));
        if($file = $request->file('img')) {
            if($file = $request->file('img')) {
                File::delete(public_path().$works->img);
                $namefile = time() . $file->getClientOriginalName();
                $file->move('img/works', $namefile);
                $input['img'] = '/img/works/'.$namefile;
            }
        }
        $status = $works->fill($input)->save();
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
        $works = Works::findOrFail($id);
        File::delete(public_path().$works->img);
        $status = $works->delete();
        if($status) {
            Session::flash('flash_message','Успешно удалено');
            return redirect()->back();
        }
    }

}
