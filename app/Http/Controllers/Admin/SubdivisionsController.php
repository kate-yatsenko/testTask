<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subdivision;
use Response;

class SubdivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subdivisions = Subdivision::all();
        return view('admin.subdivisions.index', ['subdivisions'=>$subdivisions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('title', 'id');
        return view('admin.subdivisions.create', compact('companies'));
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
            'title' =>'required',
            'address'   =>  'required',
            'description'  =>  'required'
        ]);
        $subdivision = Subdivision::add($request->all());
        $subdivision->setCompany($request->get('company_id'));

        return redirect()->route('subdivisions.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subdivision = Subdivision::find($id);
        $companies = Company::pluck('title', 'id');

        return view('admin.subdivisions.edit', compact('companies', 'subdivision'));
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
            'title' =>'required',
            'address'   =>  'required',
            'description'  =>  'required'
        ]);
        $subdivision = Subdivision::find($id);
        $subdivision->edit($request->all());
        $subdivision->setCompany($request->get('company_id'));

        return redirect()->route('subdivisions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subdivision = Subdivision::destroy($id);

        return Response::json($subdivision);
    }
}
