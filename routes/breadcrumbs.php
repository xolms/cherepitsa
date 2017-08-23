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
    $breadcrumbs->push($usluga->name , route('usluga.item', $usluga->alias));
});


Breadcrumbs::register('products.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Продукция', route('products.index'));
});
Breadcrumbs::register('product.category', function($breadcrumbs, $category)
{
    $cat = \App\Category::where('alias', $category)->first();
    $breadcrumbs->parent('products.index');
   $breadcrumbs->push($cat->name, route('product.category', ['category' => $cat->alias]));

});
Breadcrumbs::register('product.maker', function ($breadcrumbs, $category, $maker) {
    $cat = \App\Category::where('alias', $category)->first();
    $item = \App\Maker::where('alias', $maker)->first();
    $breadcrumbs->parent('product.category', $category);
    $breadcrumbs->push($item->name, route('product.maker', ['category' => $category ,'maker' => $item->alias]));
});
Breadcrumbs::register('product.product', function ($breadcrumbs, $category, $maker, $product) {
    $item = \App\Product::where('alias', $product)->first();
    $col = $breadcrumbs->parent('product.maker', $category, $maker);
    $breadcrumbs->push($item->name, route('product.product', ['category' => $category ,'maker' => $maker, 'product' => $item->alias ]));
});

Breadcrumbs::register('work.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Наши работы', route('work.index'));
});
Breadcrumbs::register('work.category', function($breadcrumbs, $category)
{
    $cat = \App\Usluga::where('alias', $category)->first();
    $breadcrumbs->parent('work.index');
    $breadcrumbs->push($cat->name , route('work.category', $cat->alias));
});
Breadcrumbs::register('work.alias', function($breadcrumbs, $category, $alias)
{
    $work = \App\Works::where('alias', $alias)->first();
    $cat = \App\Usluga::where('alias', $category)->first();
    $breadcrumbs->parent('work.category', $category);
    $breadcrumbs->push($work->name , route('work.alias', $work->alias));
});






