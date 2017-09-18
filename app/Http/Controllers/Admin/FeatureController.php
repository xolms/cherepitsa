<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fea = Feature::orderBy('position', 'asc')->get();
        return view('admin.feature.index', ['fea' => $fea]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = [
            'name_rus' => $request->name,
            'name' => $this->tourl($this->translite($request->name)),
            'unit' => empty($request->unit) ? '' : $request->unit,
            'required' => isset($request->required) ? '1' : '0',
            'index' => isset($request->index) ? '1' : '0',
            'position' => '0'
        ];
        $status = Feature::create($input);
        if ($status) {
            Session::flash('flash_message', 'Успешно добавлено');
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
        $fea = Feature::findOrFail($id);
        return view('admin.feature.edit', ['fea' => $fea]);
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
        $fea = Feature::findOrFail($id);
        $input = [
            'unit' => empty($request->unit) ? '' : $request->unit,
            'required' => isset($request->required) ? '1' : '0',
            'index' => isset($request->index) ? '1' : '0',
        ];
        $status = $fea->fill($input)->save();
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
        $fea = Feature::findOrFail($id);
        $status = $fea->delete();
        if($status) {
            Session::flash('flash_message','Успешно удалено');
            return redirect()->back();
        }
    }

    public function positionGet() {
        $fea = Feature::orderBy('position', 'asc')->get();
        $pos = Feature::select('position')->orderBy('position', 'asc')->get();
        $position = array();
        foreach ($pos as $item) {
            $position[] = $item->position;
        }
        $pos = implode(',', $position);
        return view('admin.feature.position', ['fea' => $fea, 'pos' => $pos]);
    }
    public function positionPost(Request $request) {
        $fea = Feature::orderBy('position', 'asc')->get()->toArray();
        $pos = explode(',', $request->position);
        $count = count($fea) - 1;

        for ($i = 0; $i <= $count; $i++) {
            $position = $pos[$i];

            $feature = Feature::where('id', $fea[$i]['id'])->first();
            $status = $feature->fill(['position' => $position])->save();
        }
        if($status) {
            Session::flash('flash_message','Порядок успешно изменен');
            return redirect()->back();
        }
    }
}
