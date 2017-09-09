<?php

namespace App\Http\Controllers;

use App\About;
use App\Category;
use App\Event;
use App\Maker;
use App\Page;
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
            $meta = Page::where('alias', 'index')->first();
            $usluga = Usluga::select('alias', 'bg', 'small_text', 'name')->get();
            $uslugaWidth = $this->countUsluga(count($usluga));
            $about = About::first();
            $rev = Review::where('status', '1')->limit(4)->get();
            $category = Category::with('maker')->where('alias','!=', 'other')->get();
            $view = \View::make('pages.index')->with(['category' => $category , 'meta' => $meta , 'rev' => $rev ,'slider' => $slider,'about' => $about, 'width' => $uslugaWidth,  'usluga' => $usluga])->render();
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
            $meta = Page::where('alias', 'contacts')->first();


            foreach ($setting as $item) {
                $arrset[$item['name']] = $item['value'];
            }
            $view = \View::make('pages.contact')->with(['setting'=> $arrset, 'meta' => $meta])->render();
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
            $meta = Page::where('alias', 'usluga')->first();
            $uslugaWidth = $this->countUsluga(count($usluga));
            $view = \View::make('pages.uslugi')->with(['usluga'=> $usluga, 'width' => $uslugaWidth, 'meta' => $meta])->render();

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
            $meta = Page::where('alias', 'about')->first();
            $random = Usluga::select('alias', 'bg', 'small_text', 'name')->inRandomOrder()->limit(4)->get();
            $uslugaWidth = $this->countUsluga(count($random));
            $view = \View::make('pages.about')->with(['about' => $about, 'width' => $uslugaWidth, 'usluga' => $random, 'meta' => $meta])->render();

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
            $meta = Page::where('alias', 'events')->first();
            $events = Event::where('date_end', '>=', Carbon::now())->get();
            $view = \View::make('pages.events')->with(['events' => $events, 'meta' => $meta])->render();
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
            $meta = Page::where('alias', 'works')->first();
            $view = \View::make('pages.works')->with(['works' => $works, 'uslugas' => $usluga, 'meta' => $meta])->render();
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
    public function allText(Request $request)
    {

        $path = $request->path;
        $alias = $request->alias;
        if ($path == 'product.category') {
            $text = Category::select('text')->where('alias', $alias)->first();
        }
        elseif ($path == 'product.maker') {
            $text = Maker::select('text')->where('alias', $alias)->first();
        }
        return response()->json($text);
    }
}
