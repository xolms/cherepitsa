<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $times = str_replace('/', '-', $request->date_end);
        $times_str = strtotime($times);
        $this->validate($request, [
            'title' => 'required|max:150',
            'text' => 'required',
            'img' => 'required|image',
            'date_end' => 'required'
        ]);
        $input = $request->all();
        $time = Carbon::now()->timestamp;

        if ($times_str > $time) {
            $input['date_end'] = $times;
        }
        else {
            Session::flash('error', 'Дата окончания не может быть меньше или равна ненышней');
            return redirect()->back()->withInput();
        }
        if($file = $request->file('img')) {
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/event', $namefile);
            $input['img'] = '/img/event/'.$namefile;
        }
        $status = Event::create($input);
        if ($status) {
            Session::flash('flash_message', 'Акция успешно добавлена');
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

        $event = Event::findOrFail($id);
        return view('admin.events.edit', ['event' => $event]);
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
        $event = Event::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|max:150',
            'text' => 'required',
            'date_end' => 'required'
        ]);
        $input = $request->all();

        $times = str_replace('/', '-', $request->date_end);
        if ($times != $event->date_end) {
            $times_str = strtotime($times);
            $times_old = strtotime($event->date_end);
            if ($times_str < Carbon::now()->timestamp || $times_str < $times_old) {
                Session::flash('error', 'Дата окончания не может быть меньше или равна ненышней');
                return redirect()->back()->withInput();
            }
            else {
                $input['date_end'] = $times;
            }
        }



        if($file = $request->file('img')) {
            File::delete(public_path().$event->img);
            $namefile = time() . $file->getClientOriginalName();
            $file->move('img/event', $namefile);
            $input['img'] = '/img/event/'.$namefile;
        }
        $status = $event->fill($input)->save();
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
        $event = Event::findOrFail($id);
        File::delete(public_path().$event->img);
        $status = $event->delete();
        if($status) {
            Session::flash('flash_message','Успешно удалено');
            return redirect()->back();
        }
    }
    public function deleteAll(Request $request) {
        $count = 0;
        $time = Carbon::now()->timestamp;
        $events = Event::all();
        foreach ($events as $event) {
            if(strtotime($event->date_end) < $time) {
                File::delete(public_path().$event->img);
                $status = $event->delete();
                $count++;
            }
        }
        Session::flash('flash_message','Успешно удалены '.$count.' акций');
        return redirect()->back();

    }
}
