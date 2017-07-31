<?php

namespace App\Http\Controllers;

use App\About;
use App\Slider;
use App\Usluga;
use Illuminate\Http\Request;
use Cache;

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
            $about = About::first();
            $uslugaWidth = $this->countUsluga(count($usluga));
            $view = \View::make('pages.index')->with(['slider' => $slider, 'width' => $uslugaWidth, 'about' => $about, 'usluga' => $usluga])->render();
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
        $usluga = Usluga::where('alias',$alias)->first();



        if(isset($usluga)) {
            if (!Cache::has('usluga['.$alias.']')) {
                $random = Usluga::select('alias', 'bg', 'small_text', 'name')->where('alias', '!=', $alias)->inRandomOrder()->limit(4)->get();
                $uslugaWidth = $this->countUsluga(count($random));
                $view = \View::make('pages.usluga')->with(['usluga' => $usluga, 'random' => $random, 'width' => $uslugaWidth])->render();
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


    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function usluga() {
        if(!Cache::has('uslugi')) {
            $usluga = Usluga::select('alias', 'bg', 'small_text', 'name')->get();
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
