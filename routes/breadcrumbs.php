<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Главная', route('index'));
});


Breadcrumbs::register('event.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Акции', route('event.index'));
});
Breadcrumbs::register('about.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('О нас', route('about.index'));
});


Breadcrumbs::register('contact.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Контакты', route('contact.index'));
});

Breadcrumbs::register('uslugi.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Услуги', route('uslugi.index'));
});
Breadcrumbs::register('usluga.item', function($breadcrumbs, $alias)
{
    $breadcrumbs->parent('uslugi.index');
    $usluga = \App\Usluga::where('alias', $alias)->first();
    if(isset($usluga)) {
      $breadcrumbs->push($usluga->name , route('usluga.item', $usluga->alias));  
    }
    else {
        return abort('404', 'Страница не найдена');
    }
    
});


Breadcrumbs::register('products.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Продукция', route('products.index'));
});
Breadcrumbs::register('product.category', function($breadcrumbs, $category)
{
    $cat = \App\Category::where('alias', $category)->first();
    if(isset($cat)) {
        $breadcrumbs->parent('products.index');
        $breadcrumbs->push('Категория: '.$cat->name, route('product.category', ['category' => $cat->alias]));
    }
    else {
        return abort('404', 'Страница не найдена');
    }
    

});
Breadcrumbs::register('product.maker', function ($breadcrumbs, $maker) {
    $item = \App\Maker::where('alias', $maker)->first();
    if (isset($item)) {

    $breadcrumbs->parent('products.index');
    $breadcrumbs->push('Производитель: '.$item->name, route('product.maker', ['maker' => $item->alias]));
    }
    else {
      return  abort('404', 'Страница не найдена');
    }
    
});
Breadcrumbs::register('product.catproduct', function ($breadcrumbs, $category, $product) {
    $item = \App\Product::where('alias', $product)->first();
    
    if(isset($item)) {
        $col = $breadcrumbs->parent('product.category', $category);
        $breadcrumbs->push($item->name, route('product.catproduct', ['category' => $category , 'product' => $item->alias ]));
    }
    else {
       return abort('404', 'Страница не найдена');
    }
});
Breadcrumbs::register('product.makerproduct', function ($breadcrumbs, $maker, $product) {
    $item = \App\Product::where('alias', $product)->first();

    if(isset($item)) {
        $col = $breadcrumbs->parent('product.maker', $maker);
        $breadcrumbs->push($item->name, route('product.makerproduct', ['maker' => $maker , 'product' => $item->alias ]));
    }
    else {
        return abort('404', 'Страница не найдена');
    }
});

Breadcrumbs::register('work.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Наши работы', route('work.index'));
});
Breadcrumbs::register('work.category', function($breadcrumbs, $category)
{
    $cat = \App\Usluga::where('alias', $category)->first();
    
    if(isset($cat)) {
        $breadcrumbs->parent('work.index');
        $breadcrumbs->push($cat->name , route('work.category', $cat->alias));
    }
    else {
     return   abort('404', 'Страница не найдена');
    }
});
Breadcrumbs::register('work.alias', function($breadcrumbs, $category, $alias)
{
    $work = \App\Works::where('alias', $alias)->first();
    $cat = \App\Usluga::where('alias', $category)->first();
    if(isset($work)) {
        $breadcrumbs->parent('work.category', $category);
        $breadcrumbs->push($work->name , route('work.alias', $work->alias));
    }
    else {
      return  abort('404', 'Страница не найдена');
    }
    
});