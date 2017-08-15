<?php

namespace App\Http\Controllers\Admin;

use App\Maker;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('makers')->get();
        return view('admin.product.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maker = Maker::all();
        return view('admin.product.add', ['maker' => $maker]);
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
        $empty = Product::where('alias', $alias)->first();

        if (isset($empty)) {
            Session::flash('error', 'Такой alias уже занят');
            return redirect()->back()->withInput();
        }
        $this->validate($request, [
            'alias' => 'required|unique:categories,alias|min:2|max:60',
            'title' => 'required|max:60',
            'description' => 'required|max:300',
            'name' => 'required',
            'img' => 'required|image',
            'text' => 'required',
            'price' => 'required',
            'maker_id' => 'required'
        ]);
        $maker = Maker::where('id', $request->maker_id)->first();
        $makerName = $this->tourl($this->translite($maker->name));
        $input = $request->all();
        $input['alias'] = $this->tourl($this->translite($request->alias));

        if($file = $request->file('img')) {
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/category/'.$makerName, $namefile);
            $input['img'] = '/img/category/'.$makerName.'/'.$namefile;
        }
        $status = Product::create($input);
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
        $maker = Maker::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', ['maker' => $maker, 'product' => $product]);
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
        $product = Product::findOrFail($id);
        $alias = $this->tourl($this->translite($request->alias));
        if ($alias != $product->alias) {
            $empty = Maker::where('alias', $alias)->first();
            if (isset($empty)) {
                Session::flash('error', 'Такой alias уже занят');
                return redirect()->back()->withInput();
            }
        }
        $this->validate($request, [
            'alias' => 'required|min:2|max:60',
            'title' => 'required|max:60',
            'description' => 'required|max:300',
            'name' => 'required',
            'text' => 'required',
            'price' => 'required',
            'maker_id' => 'required'
        ]);
        $input = $request->all();
        $maker = Maker::where('id', $request->maker_id)->first();
        $makerName = $this->tourl($this->translite($maker->name));
        $input['alias'] = $this->tourl($this->translite($request->alias));
        if($file = $request->file('img')) {
            File::delete(public_path().$product->img);
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/category/'.$makerName, $namefile);
            $input['img'] = '/img/category/'.$makerName.'/'.$namefile;
        }
        $status = $product->fill($input)->save();
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
        $usluga = Product::findOrFail($id);
        File::delete(public_path().$usluga->img);
        $status = $usluga->delete();
        if($status) {
            Session::flash('flash_message','Успешно удалено');
            return redirect()->back();
        }
    }
}
