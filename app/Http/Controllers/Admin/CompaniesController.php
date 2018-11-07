<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Response;
use Illuminate\Validation\Rule;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', ['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
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
            'title' =>'required|unique:companies',
            'city'   =>  'required',
            'description'  =>  'required',
            'image' =>  'nullable|image'
        ]);

        $company = Company::add($request->all());
        $company->uploadImage($request->file('image'));

        return redirect()->route('companies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.companies.edit', compact('company'));
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
        $company = Company::find($id);
        $this->validate($request, [
            'title' => [
                'required',
                Rule::unique('companies')->ignore($company->id)
            ],
            'city'   =>  'required',
            'description'  =>  'required',
            'image' =>  'nullable|image'
        ]);
        $company->edit($request->all());
        $company->uploadImage($request->file('image'));

        return redirect()->route('companies.index');

    }

    public function destroy($id)
    {
        $company = Company::find($id)->remove();

        return Response::json($company);
    }
}
