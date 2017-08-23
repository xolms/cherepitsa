<?php

namespace App\Http\Controllers;

use App\About;
use App\Category;
use App\Event;
use App\Maker;
use App\Product;
use App\Review;
use App\Setting;
use App\Slider;
use App\Usluga;
use App\Works;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cache;
use Illuminate\Pagination\LengthAwarePaginator;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        if (!Cache::has('page[index]')) {

            $slider = Slider::all();
            $usluga = Usluga::select('alias', 'bg', 'small_text', 'name')->get();
            $uslugaWidth = $this->countUsluga(count($usluga));
            $about = About::first();
            $rev = Review::where('status', '1')->limit(4)->get();
            $category = Category::with('maker')->where('alias','!=', 'other')->get();
            $view = \View::make('pages.index')->with(['category' => $category , 'rev' => $rev ,'slider' => $slider,'about' => $about, 'width' => $uslugaWidth,  'usluga' => $usluga])->render();
            Cache::put('page[index]',$view, '60');
        }
        else {
           $view =  Cache::get('page[index]');
        }
        return response($view);


    }

    /**
     * @param $alias
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function uslugaItem($alias) {
        $usluga = Usluga::with('works')->where('alias',$alias)->first();


        if(isset($usluga)) {
            if (!Cache::has('usluga['.$alias.']')) {
                $random = Usluga::select('alias', 'bg', 'small_text', 'name')->where('alias', '!=', $alias)->get();

                $view = \View::make('pages.usluga')->with(['usluga' => $usluga, 'random' => $random])->render();
                Cache::put('usluga[' . $alias . ']', $view, '60');
            }
            else {
                $view =  Cache::get('usluga['.$alias.']');
            }
            return response($view);
        }
        else{
            abort('404', 'Такой услуги не существует');
        }

    }

    public function contacts() {
        if(!Cache::has('contact')) {
            $arrset = array();
            $setting = Setting::all();


            foreach ($setting as $item) {
                $arrset[$item['name']] = $item['value'];
            }
            $view = \View::make('pages.contact')->with(['setting'=> $arrset])->render();
            Cache::put('contact', $view, 60);
        }
        else {
            $view = Cache::get('contact');
        }
        return response($view);

    }


    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function usluga() {
        if(!Cache::has('uslugi')) {
            $usluga = Usluga::select('alias', 'bg', 'text', 'name')->get();
            $uslugaWidth = $this->countUsluga(count($usluga));
            $view = \View::make('pages.uslugi')->with(['usluga'=> $usluga, 'width' => $uslugaWidth])->render();

            Cache::put('uslugi', $view, 60);
        }
        else {
            $view = Cache::get('uslugi');
        }

        return response($view);
    }

    public function about() {
        if(!Cache::has('about')) {
            $about = About::first();
            $random = Usluga::select('alias', 'bg', 'small_text', 'name')->inRandomOrder()->limit(4)->get();
            $uslugaWidth = $this->countUsluga(count($random));
            $view = \View::make('pages.about')->with(['about' => $about, 'width' => $uslugaWidth, 'usluga' => $random])->render();

            Cache::put('about', $view, 60);
        }
        else {
            $view = Cache::get('about');
        }
        return response($view);

    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function events() {
        if (!Cache::has('events')) {
            $events = Event::where('date_end', '>=', Carbon::now())->get();
            $view = \View::make('pages.events')->with(['events' => $events])->render();
            Cache::put('events', $view, 60);
        }
        else {
            $view = Cache::get('events');
        }
        return response($view);
    }

    public function works() {
        if (!Cache::has('works')) {
            $works = Works::with('usluga')->paginate(12);
            $usluga = Usluga::all();
            $view = \View::make('pages.works')->with(['works' => $works, 'uslugas' => $usluga])->render();
            Cache::put('works', $view, 60);
        }
        else {
            $view = Cache::get('works');
        }

        return response($view);
    }
    public function workItem($category , $alias) {
        if (!Cache::has('work['.$alias.']')) {

            $work = Works::where('alias', $alias)->first();
            $random = Works::with('usluga')->where('alias', '!=' , $work->alias)->where('usluga_id', $work->usluga_id)->get();
            $usluga = Usluga::all();
            $view = \View::make('pages.work')->with(['work' => $work, 'usluga' => $usluga, 'items' => $random])->render();
            Cache::put('work['.$alias.']', $view, 60);
        }
        else {
            $view = Cache::get('work['.$alias.']');
        }

        return response($view);
    }
    public function workCategory($alias) {
        if (!Cache::has('workcategory['.$alias.']')) {

            $usluga = Usluga::where('alias', $alias)->first();
            $uslugas = Usluga::all();
            $works = Works::where('usluga_id', $usluga->id)->paginate(12);
            $view = \View::make('pages.works.category')->with(['works' => $works, 'usluga' => $usluga, 'items' => $uslugas])->render();
            Cache::put('workcategory['.$alias.']', $view, 60);
        }
        else {
            $view = Cache::get('workcategory['.$alias.']');
        }
        return $view;

    }

    public function product(Request $request) {
        if (!Cache::has('products')) {
            $items = array();
            $category = Product::with('makers', 'makers.category')->paginate(12);
            $count = count($category);


            if ($count == 0) {
                return abort('404', 'Такой страницы нет');
            }
            $view = \View::make('pages.product.all')->with(['category' => $category])->render();
            Cache::put('products', $view, 60);
        }
        else {
            $view = Cache::get('products');
        }
        return $view;

    }
    public function productCategory($category, Request $request) {
        if (!Cache::has('productscat['.$category.']')) {
            $category = Category::with('maker')->where('alias', $category)->first();

            if (isset($category)) {
                $categories = Category::where('alias', $category->alias)->first();
                $maker = array();
                foreach ($category->maker as $item) {
                    $maker[] = $item->id;
                }
                $product = Product::with('makers', 'makers.category')->where('maker_id', $maker)->paginate(20);
                $count = count($product);
                if ($count == 0) {
                    return abort('404', 'Страница не найдена');
                }
                $view = \View::make('pages.product.category')->with(['category' => $product, 'meta' => $categories])->render();
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

    public function productMaker($category, $maker) {
        if (!Cache::has('productsmaker['.$maker.']')) {
            $maker = Maker::where('alias', $maker)->first();

            if(isset($maker)) {
                $product = Product::with('makers', 'makers.category')->where('maker_id' , $maker->id)->paginate(20);
                $count = count($product);
                if ($count == 0) {
                    return abort('404', 'Страница не найдена');
                }
                $view = \View::make('pages.product.category')->with(['category' => $product, 'meta' => $maker])->render();
                Cache::put('productsmaker['.$maker.']', $view, 60);
            }
            else {
                return abort('404', 'Производитель не найден');
            }
        }
        else {
            $view = Cache::get('productsmaker['.$maker.']');
        }

        return $view;

    }

    public function productProduct($category, $maker, $product) {
        if (!Cache::has('product['.$product.']')) {
            $item = Product::with('makers', 'makers.category')->where('alias', $product)->first();
            if (isset($item)) {
                $alias = Maker::where('alias', $maker)->first();
                $items = Product::with('makers', 'makers.category')->where('id', '!=' , $item->id)->where('maker_id' , $alias->id)->inRandomOrder()->get();
                $view = \View::make('pages.product.item')->with(['price' => $item, 'other' => $items])->render();
                Cache::put('product['.$product.']', $view, 60);
            }
            else {
                return abort('404', 'Товар не найден');
            }
        }
        else {
            $view = Cache::get('product['.$product.']');
        }


        return $view;
    }



    /**
     * @param $count
     * @return float|int
     */
    protected function countUsluga($count) {
        for ($i = 4; $i>=1; $i-- ) {
            if($count % $i == 0) {
                return $i;
            }
        }
        return $i;
    }
}
