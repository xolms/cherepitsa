<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MetaController extends Controller
{
    function __construct(Page $page)
    {
    }
    public function index() {
        $meta = Page::all();
        return view('admin.meta.index', ['meta' => $meta]);
    }
    public function edit($id)
    {
        $meta = Page::findOrFail($id);
        return view('admin.meta.edit', ['meta' => $meta]);

    }
    public function update(Request $request, $id)
    {
        $meta = Page::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|max:300',
            'keywords' => 'required'
        ]);
        $input = $request->all();
        $status = $meta->fill($input)->save();
        if($status) {
            Session::flash('flash_message', 'Успешно обновлено');
            return redirect()->back();
        }


    }

}
