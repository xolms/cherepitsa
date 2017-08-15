<?php
/**
 * Created by PhpStorm.
 * User: Степан
 * Date: 13.08.2017
 * Time: 17:52
 */

namespace App\Http\Composers;

use App\Category;
use Illuminate\Contracts\View\View;
class CategoryComposer
{
    protected $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function compose(View $view) {



        $view->with('categories', $this->category->select('name', 'alias')->get());

    }
}