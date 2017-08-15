<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rev = Review::all();
        return view('admin.review.index', ['rev' => $rev]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required',
            'img' => 'image',
            'text' => 'required',
        ]);
        $input = $request->all();
        if($file = $request->file('img')) {
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/review', $namefile);
            $input['img'] = '/img/review/'.$namefile;
        }
        $input['status'] = 0;
        $status = Review::create($input);
        if ($status) {
            Session::flash('flash_message', 'Отзыв успешно добавлен');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rev = Review::findOrFail($id);
        return view('admin.review.edit', ['rev' => $rev]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rev = Review::findOrFail($id);
        $validator = $this->validate($request, [
            'name' => 'required',
            'img' => 'image',
            'text' => 'required',
        ]);
        $input = $request->all();
        if($file = $request->file('img')) {
            File::delete(public_path().$rev->img);
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/review', $namefile);
            $input['img'] = '/img/review/'.$namefile;
        }
        $status = $rev->fill($input)->save();
        if($status) {
            Session::flash('flash_message', 'Успешно обновлено');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rev = Review::findOrFail($id);
        File::delete(public_path().$rev->img);
        $status = $rev->delete();
        if($status) {
            Session::flash('flash_message','Успешно удалено');
            return redirect()->back();
        }
    }
    public function status(Request $request, $id) {
        $rev = Review::findOrFail($id);
        $input = $request->all();
        $input['status'] = $request->status;
        $status = $rev->fill($input)->save();
        if($status) {
            Session::flash('flash_message', 'Успешно обновлено');
            return redirect()->back();
        }
    }
}
