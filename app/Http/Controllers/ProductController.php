<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feature;
use App\Maker;
use App\Page;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function product(Request $request) {

        if (!Cache::has('products')) {
            $data = Feature::where('index', '1')->get();
            $items = array();
            $category = Product::with(['makers', 'category', 'images' => function($query) {
                $query->orderBy('index', 'desc');
            }])->paginate(12);
            $count = count($category);
            $meta = Page::where('alias', 'production')->first();
            if ($category->currentPage() == 1 && $count == 0) {
                return view('pages.product.empty', ['meta' => $meta]);
            }
            if ($count == 0) {
                return abort('404', 'Такой страницы нет');
            }
            $view = \View::make('pages.product.all')->with(['category' => $category, 'meta' => $meta, 'fea' => $data])->render();
            Cache::put('products', $view, 60);
        }
        else {
            $view = Cache::get('products');
        }
        return $view;

    }

    public function productCategory($category) {
        if (!Cache::has('productscat['.$category.']')) {
            $category = Category::where('alias', $category)->first();
            $data = Feature::where('index', '1')->get();

            if (isset($category)) {
                $product = Product::with(['makers', 'category', 'images' => function($query) {
                    if(count($query) > 0) {
                        $query->orderBy('index', 'desc');
                    }
                }])->where('category_id', $category->id)->paginate(12);
                $count = count($product);
                if ($product->currentPage() == 1 && $count == 0) {
                    return view('pages.product.empty', ['meta' => $category]);
                }
                if ($count == 0) {
                    return abort('404', 'Страница не найдена');
                }
                $view = \View::make('pages.product.category')->with(['category' => $product, 'meta' => $category, 'fea' => $data])->render();
                Cache::put('productscat['.$category.']', $view, 60);
            }
            else {
                return abort('404', 'Категория не найдена');
            }
        }
        else {
            $view = Cache::get('productscat['.$category.']');
        }
        return $view;
    }


    public function productMaker($maker, Request $request) {
        if (!Cache::has('productsmakercat['.$maker.']')) {
            $data = Feature::where('index', '1')->get();
            $maker = Maker::where('alias', $maker)->first();

            if(isset($maker)) {
                $product = Product::with(['makers', 'category', 'images' => function($query) {
                    if(count($query) > 0) {
                        $query->orderBy('index', 'desc');
                    }
                }])->where('category_id', $maker->id)->paginate(12);
                $count = count($product);
                if ($product->currentPage() == 1 && $count == 0) {
                    return view('pages.product.empty', ['meta' => $maker]);
                }
                if ($count == 0) {
                    return abort('404', 'Страница не найдена');
                }
                $view = \View::make('pages.product.maker')->with(['category' => $product, 'meta' => $maker, 'fea' => $data])->render();
                Cache::put('productsmakercat['.$maker.']', $view, 60);
            }
            else {
                return abort('404', 'Производитель не найден');
            }
        }
        else {
            $view = Cache::get('productsmakercat['.$maker.']');
        }

        return $view;

    }




    public function productCatProduct($category, $product) {
        if (!Cache::has('productcat['.$product.']')) {
            $data = Feature::all();

            $item = Product::with(['makers', 'category', 'images' => function($query) {
                if(count($query) > 0) {
                    $query->orderBy('index', 'desc');
                }
            }])->where('alias', $product)->first();
            if (isset($item)) {
                $cat = Category::where('id', $item->category->id)->first();
                $items = Product::with(['makers', 'category', 'activeimg'])->where('id', '!=' , $item->id)->where('category_id' , $cat->id)->inRandomOrder()->limit(8)->get();
                $view = \View::make('pages.product.itemcat')->with(['price' => $item, 'other' => $items, 'fea' => $data])->render();
                Cache::put('productcat['.$product.']', $view, 60);
            }
            else {
                return abort('404', 'Товар не найден');
            }
        }
        else {
            $view = Cache::get('productcat['.$product.']');
        }


        return $view;
    }
    public function productMakerProduct($maker, $product) {
        if (!Cache::has('productmaker['.$product.']')) {
            $data = Feature::all();
            $item = Product::with(['makers', 'category', 'images' => function($query) {
                $query->where('index', 'desc');
            }])->where('alias', $product)->first();
            if (isset($item)) {
                $alias = Maker::where('alias', $maker)->first();
                $items = Product::with(['makers', 'category', 'activeimg'])->where('id', '!=' , $item->id)->where('maker_id' , $alias->id)->inRandomOrder()->limit(8)->get();
                $view = \View::make('pages.product.itemmaker')->with(['price' => $item, 'other' => $items, 'fea' => $data])->render();
                Cache::put('productmaker['.$product.']', $view, 60);
            }
            else {
                return abort('404', 'Товар не найден');
            }
        }
        else {
            $view = Cache::get('productmaker['.$product.']');
        }


        return $view;
    }
}
