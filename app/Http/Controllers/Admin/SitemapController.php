<?php

namespace App\Http\Controllers\Admin;

use App\Usluga;
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
        $sitemap->store('xml', 'sitemap');
        \Session::flash('flash_message', 'Sitemap успешно обновлена');
        return redirect('admincp');

    }
}
