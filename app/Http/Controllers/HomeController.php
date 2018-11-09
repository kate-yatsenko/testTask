<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;
use App\Company;
use App\Subdivision;
use Response;

class HomeController extends Controller
{
    public function index(){
        $companies = Company::all();
        return view('pages.index', ['companies' => $companies]);
    }

    public function  showComp($id){
        $company = Company::find($id);

        return Response::json($company);
    }

    public function  showSub($id){
        $subdivision = Subdivision::find($id);

        return Response::json($subdivision);
    }

    public function  showWorkers($id){
        $worker = Worker::find($id);

        return Response::json($worker);
    }

}

