<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Carbon\Carbon;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $del = [];
        foreach(Auth::user()->departements as $dept){
            array_push($del,$dept->id);
        }
        $delegations = Registration::where('created_at',Carbon::today())->where('status',0)->whereIn('departement_id',$del)->paginate(10);
        $registrations = Registration::orderBy('id','DESC')->paginate(10);
        return view('home',compact('registrations','delegations'));
    }
}
