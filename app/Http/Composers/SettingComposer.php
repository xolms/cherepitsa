<?php
/**
 * Created by PhpStorm.
 * User: Степан
 * Date: 01.08.2017
 * Time: 17:44
 */

namespace App\Http\Composers;


use App\About;
use App\Setting;
use Illuminate\Contracts\View\View;

class SettingComposer
{
    protected $page;
    public function __construct(Setting $setting, About $about) {
        $this->setting = $setting;
        $this->about = $about;
    }
    public function compose(View $view) {
        $about =  $this->about->first();
        $arrset = array();
        foreach ($this->setting->all() as $item) {
            $arrset[$item['name']] = $item['value'];
        }

        $view->with(['setting' => $arrset, 'about' => $about]);

    }
}