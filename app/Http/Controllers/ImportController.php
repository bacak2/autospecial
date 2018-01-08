<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $user = User::all();
        //dd($user);
        return view('import.index', compact('user'));
    }
}
