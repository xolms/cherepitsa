<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Feature;
use App\Maker;
use App\Product;
use App\ProductImage;
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
        $product = Product::with('makers', 'category', 'images')->get();

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
        $fea = Feature::orderBy('position', 'asc')->get();
        $category = Category::all();
        return view('admin.product.add', ['maker' => $maker, 'category' => $category, 'fea' => $fea]);
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
            'alias' => 'required|unique:products,alias|min:2|max:80',
            'title' => 'required|max:80',
            'description' => 'required|max:300',
            'name' => 'required',
            'text' => 'required',
            'price' => 'required',
            'maker_id' => 'required',
            'category_id' => 'required'
        ]);
        $maker = Maker::where('id', $request->maker_id)->first();
        $makerName = $this->tourl($this->translite($maker->name));
        $input = $request->all();
        $input['data'] = $request->data;
        $input['alias'] = $this->tourl($this->translite($request->alias));
        $status = Product::create($input);
        foreach ($request->img as $k => $item) {
            $image['alt'] = $request->alt[$k];
            $image['color'] = $request->color[$k];
            $image['product_id'] = $status->id;
            $image['index'] = $request->alt['0'] ? '1' : '0';
            $namefile = time() . $item->getClientOriginalName();
            $item->move('img/products/'.$status->id, $namefile);
            $image['img'] = '/img/products/'.$status->id.'/'.$namefile;
            ProductImage::create($image);
        }
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

        $product = Product::with(['makers', 'category','images'])->findOrFail($id);
        $fea = Feature::orderBy('position', 'asc')->get();
        $category = Category::with('maker')->where('id', $product->category_id)->first();
        return view('admin.product.edit', ['product' => $product, 'category' => $category, 'fea' => $fea]);
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
            'alias' => 'required|min:2|max:80',
            'title' => 'required|max:80',
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
        $input['data'] = $request->data;
        $status = $product->fill($input)->save();
        foreach ($request->img as $k => $item) {
            $image['alt'] = $request->alt[$k];
            $image['color'] = $request->color[$k];
            $image['product_id'] = $product->id;
            $image['index'] = '0';
            $namefile = time() . $item->getClientOriginalName();
            $item->move('img/products/'.$product->id, $namefile);
            $image['img'] = '/img/products/'.$product->id.'/'.$namefile;
            ProductImage::create($image);
        }
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
        File::deleteDirectory(public_path().'products/'.$usluga->id);
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

    public function deleteImg(Request $request) {
        $product = ProductImage::where('id', $request->id)->first();
        File::delete(public_path().$product->img);
        $product->delete();
        $message = 'Изображение успешно удалено';
        $status = '1';

        if ($product->index == 1) {
            $prod = ProductImage::where('product_id', $product->product_id)->where('id', '!=', $product->id)->inRandomOrder()->first();
            $prod->fill(['index' => '1'])->save();
        }
        $data = ['status' => $status, 'message' => $message];
        return response()->json($data);
    }

    public function getPosition($id) {
        $product = ProductImage::where('product_id', $id)->get();
        $id = $id;
        return view('admin.product.position', ['product' => $product, 'id' => $id]);
    }
    
    public function postPosition(Request $request, $id) {
        $product = ProductImage::where('product_id', $id)->get();
        foreach ($product as $item) {
            if ($item->id == $request->position) {
                $input['index'] = 1;
            }
            else {
                $input['index'] = 0;
            }
            $status = $item->fill($input)->save();
        }
        if($status) {
            Session::flash('flash_message', 'Изображение в каталоге успешно измененно');
            return redirect()->back();
        }
    }
}
