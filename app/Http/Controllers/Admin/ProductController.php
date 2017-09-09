<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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
        $product = Product::with('makers', 'category')->get();

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
        $category = Category::all();
        return view('admin.product.add', ['maker' => $maker, 'category' => $category]);
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
            'alias' => 'required|unique:products,alias|min:2|max:60',
            'title' => 'required|max:60',
            'description' => 'required|max:300',
            'name' => 'required',
            'img' => 'required|image',
            'text' => 'required',
            'price' => 'required',
            'maker_id' => 'required',
            'category_id' => 'required'
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
            Session::flash('flash_message', 'Продукт успешно добавлен');
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


        $product = Product::with(['makers', 'category'])->findOrFail($id);
        $category = Category::with('maker')->where('id', $product->category_id)->first();
        return view('admin.product.edit', ['product' => $product, 'category' => $category]);
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
    public function ajaxAll(Request $request) {
        $maker = Category::with('maker')->where('id', $request->category_id)->first();
        $view = '';
        if (count($maker->maker) > 0) {
            foreach ($maker->maker as $item) {
                $views[] = "<option value=".$item->id.">".$item->name."</option>";

            }
            $view = implode(',', $views);
        }
        else {
            $view = "<option value=0 disabled>Категория пуста</option>";
        }

        return response($view);
    }
}
