<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::with('maker', 'product')->get();
        return view('admin.category.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
        $empty = Category::where('alias', $alias)->first();

        if (isset($empty)) {
            Session::flash('error', 'Такой alias уже занят');
            return redirect()->back()->withInput();
        }
        $this->validate($request, [
            'alias' => 'required|unique:categories,alias|min:2|max:60',
            'title' => 'required|max:80',
            'description' => 'required|max:300',
            'name' => 'required',
            'img' => 'required|image',
            'text' => 'required'
        ]);
        $input = $request->all();
        $input['montage'] = $request->montage == 'on' ? 1 : 0;
        $input['leaves'] = $request->leaves == 'on' ? 1 : 0;
        $input['garant'] = $request->garant == 'on' ? 1 : 0;
        $input['alias'] = $this->tourl($this->translite($request->alias));
        if($file = $request->file('img')) {
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/category', $namefile);
            $image['img'] = '/img/category/'.$namefile;
        }
        $status = Category::create($input);
        if ($status) {
            Session::flash('flash_message', 'Категория успешно добавлена');
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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', ['category' => $category]);
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
        $category = Category::findOrFail($id);
        $alias = $this->tourl($this->translite($request->alias));

        if ($alias != $category->alias) {
            $empty = Category::where('alias', $alias)->first();
            if (isset($empty)) {
                Session::flash('error', 'Такой alias уже занят');
                return redirect()->back()->withInput();
            }
        }
        $this->validate($request, [
            'alias' => 'required|min:2|max:80',
            'title' => 'required|max:80',
            'name' => 'required',
            'description' => 'required|max:300',
            'img' => 'image',
            'text' => 'required'
        ]);

        
        $input = $request->all();
        $input['montage'] = $request->montage == 'on' ? 1 : 0;
        $input['leaves'] = $request->leaves == 'on' ? 1 : 0;
        $input['garant'] = $request->garant == 'on' ? 1 : 0;
        $input['alias'] = $this->tourl($this->translite($request->alias));
        if($file = $request->file('img')) {
            if($file = $request->file('img')) {
                File::delete(public_path().$category->img);
                $namefile = time() . $file->getClientOriginalName();
                $file->move('img/category', $namefile);
                $input['img'] = '/img/category/'.$namefile;
            }
        }
        $status = $category->fill($input)->save();
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
        $category = Category::findOrFail($id);
        File::delete(public_path().$category->img);
        $status = $category->delete();
        if($status) {
            Session::flash('flash_message','Успешно удалено');
            return redirect()->back();
        }
    }
}
