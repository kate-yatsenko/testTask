<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Worker;
use App\Subdivision;
use Response;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        return view('admin.workers.index', ['workers'=>$workers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subdivisions = Subdivision::pluck('title', 'id');
        return view('admin.workers.create', compact('subdivisions'));
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
            'firstName' =>'required',
            'middleName'   =>  'required',
            'lastName'  =>  'required',
            'image' =>  'nullable|image',
            'phone'  =>  'required|min:11|numeric',
            'address'  =>  'required'
        ]);
        $worker = Worker::add($request->all());
        $worker->uploadImage($request->file('image'));
        $worker->setSub($request->get('subdivision_id'));

        return redirect()->route('workers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::find($id);
        $subdivisions = Subdivision::pluck('title', 'id');

        return view('admin.workers.edit', compact('worker', 'subdivisions'));
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
        $this->validate($request, [
            'firstName' =>'required',
            'middleName'   =>  'required',
            'lastName'  =>  'required',
            'image' =>  'nullable|image',
            'phone'  =>  'required|min:11|numeric',
            'address'  =>  'required'
        ]);

        $worker = Worker::find($id);
        $worker->edit($request->all());
        $worker->uploadImage($request->file('image'));
        $worker->setSub($request->get('subdivision_id'));

        return redirect()->route('workers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id)->remove();

        return Response::json($worker);
    }
}
