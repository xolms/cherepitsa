<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Maker;
use App\Usluga;
use App\Works;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Roumen\Sitemap\Sitemap;

class SitemapController extends Controller
{
    public function get(Sitemap $sitemap) {

        $sitemap->add('/', '2017-07-31 16:19' , '1.0', 'daily');
        $sitemap->add('/about', '2017-07-31 16:19' , '0.5', 'monthly');
        $sitemap->add('/usluga', '2017-07-31 16:19' , '0.5', 'monthly');
        $uslugi = Usluga::all();
        foreach ($uslugi as $item) {
            $sitemap->add('/usluga/'.$item->alias, $item->created_at, '0.2', 'monthy');
        }
        $sitemap->add('/events', '2017-08-15 8:35', '0.5', 'monthly');
        $sitemap->add('/production',  '2017-08-15 8:35', '0.5', 'monthly');
        $category = Category::with('product')->get();
        foreach ($category as $item) {
            $sitemap->add('/category/'.$item->alias, $item->created_at, '0.4', 'monthly');
            foreach ($item->product as $row) {
                $sitemap->add('/category/'.$item->alias.'/'.$row->alias , $row->created_at, '0.4', 'monthly');
            }
        }
        $maker = Maker::with('product')->get();
        foreach ($maker as $item) {
            $sitemap->add('/maker/'.$item->alias, $item->created_at, '0.4', 'monthly');
            foreach ($item->product as $row) {
                $sitemap->add('/maker/'.$item->alias.'/'.$row->alias , $row->created_at, '0.4', 'monthly');
            }
        }
        $sitemap->add('/works', '2017-08-15 8:35', '0.5', 'monthly');
        $works = Usluga::with('works')->get();
        foreach ($works as $work) {
            $sitemap->add('/works/'.$work->alias, $work->created_at, '0.5', 'monthly');
            foreach ($work->works as $row) {
                $sitemap->add('/works/'.$work->alias.'/'.$row->alias, $row->created_at, '0.5', 'monthly');
            }
        }
        $sitemap->store('xml', 'sitemap');
        \Session::flash('flash_message', 'Sitemap успешно обновлена');
        return redirect('admincp');

    }
}
