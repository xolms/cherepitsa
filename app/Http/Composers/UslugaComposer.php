<?php
namespace App\Http\Composers;

use App\Usluga;
use Illuminate\Contracts\View\View;
class UslugaComposer
{
    protected $page;
    public function __construct(Usluga $usluga) {
        $this->usluga = $usluga;
    }
    public function compose(View $view) {
        $view->with('nav_usluga', $this->usluga->select('name', 'alias')->get());

    }
}