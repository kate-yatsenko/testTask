<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class HomeController extends Controller
{
    public function index(){
        $companies = Company::paginate(10);
        return view('pages.index', ['companies' => $companies]);
    }
}
