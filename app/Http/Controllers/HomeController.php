<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Subdivision;
use Response;

class HomeController extends Controller
{
    public function index(){
        $companies = Company::paginate(5);
        return view('pages.index', ['companies' => $companies]);
    }

    public function  show($id){
        $subdivisions = Company::find($id)->subdivisions;

        return Response::json($subdivisions);
    }

    public function  showWorkers($id){
        $workers = Subdivision::find($id)->workers;

        return Response::json($workers);
    }

}

