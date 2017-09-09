<?php

namespace App\Http\Controllers;

use App\Category;
use App\Maker;
use App\Page;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function product(Request $request) {

        if (!Cache::has('products')) {
            $items = array();
            $category = Product::with('makers', 'category')->paginate(12);
            $count = count($category);
            $meta = Page::where('alias', 'production')->first();
            if ($category->currentPage() == 1 && $count == 0) {
                return view('pages.product.empty', ['meta' => $meta]);
            }
            if ($count == 0) {
                return abort('404', 'Такой страницы нет');
            }
            $view = \View::make('pages.product.all')->with(['category' => $category, 'meta' => $meta])->render();
            Cache::put('products', $view, 60);
        }
        else {
            $view = Cache::get('products');
        }
        return $view;

    }

    public function productCategory($category, Request $request) {
        if (!Cache::has('productscat['.$category.']')) {
            $category = Category::where('alias', $category)->first();

            if (isset($category)) {
                $product = Product::with('category', 'makers')->where('category_id', $category->id)->paginate(12);
                $count = count($product);
                if ($product->currentPage() == 1 && $count == 0) {
                    return view('pages.product.empty', ['meta' => $category]);
                }
                if ($count == 0) {
                    return abort('404', 'Страница не найдена');
                }
                $view = \View::make('pages.product.category')->with(['category' => $product, 'meta' => $category])->render();
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
            $maker = Maker::where('alias', $maker)->first();

            if(isset($maker)) {
                $product = Product::with('makers', 'category')->where('maker_id' , $maker->id)->paginate(20);
                $count = count($product);
                if ($product->currentPage() == 1 && $count == 0) {
                    return view('pages.product.empty', ['meta' => $maker]);
                }
                if ($count == 0) {
                    return abort('404', 'Страница не найдена');
                }
                $view = \View::make('pages.product.maker')->with(['category' => $product, 'meta' => $maker])->render();
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
            $item = Product::with('makers', 'category')->where('alias', $product)->first();
            if (isset($item)) {
                $cat = Category::where('id', $item->id)->first();
                $items = Product::with('makers', 'category')->where('id', '!=' , $item->id)->where('category_id' , $cat->id)->inRandomOrder()->get();
                $view = \View::make('pages.product.itemcat')->with(['price' => $item, 'other' => $items])->render();
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
            $item = Product::with('makers', 'makers.category')->where('alias', $product)->first();
            if (isset($item)) {
                $alias = Maker::where('alias', $maker)->first();
                $items = Product::with('makers', 'makers.category')->where('id', '!=' , $item->id)->where('maker_id' , $alias->id)->inRandomOrder()->get();
                $view = \View::make('pages.product.itemmaker')->with(['price' => $item, 'other' => $items])->render();
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
