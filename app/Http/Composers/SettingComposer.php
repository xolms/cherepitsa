<?php
/**
 * Created by PhpStorm.
 * User: Степан
 * Date: 01.08.2017
 * Time: 17:44
 */

namespace App\Http\Composers;


use App\Setting;
use Illuminate\Contracts\View\View;

class SettingComposer
{
    protected $page;
    public function __construct(Setting $setting) {
        $this->setting = $setting;
    }
    public function compose(View $view) {

        $arrset = array();
        foreach ($this->setting->all() as $item) {
            $arrset[$item['name']] = $item['value'];
        }

        $view->with('setting', $arrset);

    }
}