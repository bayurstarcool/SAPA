<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use App\Departement;
use Carbon\Carbon;
use Auth;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::paginate(10);
        return view('registrations.index',compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        return view('registrations.create',compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dept = Departement::findOrFail($request->dept_id);
        $sd = Carbon::createFromFormat('d/m/Y H:i:s', $request->date." 00:00:00");
        $check = Registration::whereDate('created_at',$sd)->where('departement_id',$request->dept_id)->orderBy('id','DESC')->first();
        if($check){
            $code = strtoupper($dept->code.$sd->format('ymd').($check->id+1));
            $reg = new Registration();
            $reg->code = $code;
            $reg->departement_id = $request->dept_id;
            $reg->user_id = Auth::user()->id;
            $reg->created_at = $check->created_at->addMinutes(30);
            $reg->save();
        }else{
            $date = Carbon::createFromFormat('d/m/Y H:i:s', $request->date." 00:00:00");
            $code = strtoupper($dept->code.$date->format('ymd')."1");
            $date->setTimeFromTimeString('08:00');
            $reg = new Registration();
            $reg->departement_id = $request->dept_id;
            $reg->user_id = Auth::user()->id;
            $reg->code = $code;
            $reg->created_at = $date;
            $reg->save();
        }
        return redirect()->to('/qrcode/'.$code);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('registrations.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reg = Registration::findOrFail($id);
        return view('registrations.edit',compact('reg'));
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
        $reg = Registration::findOrFail($id);
        $reg->name = $request->name;
        $reg->code = $request->code;
        $reg->save();
        return redirect()->to('/registrations')->with(['success'=>true,'message'=>'Registration updated successfully']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reg = Registration::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function takeAction($id,Request $request){
        $reg = Registration::where('id',$id)->first();
        if($request->ref=="success"){
            $reg->status=1;
        }else{
            $reg->status=0;
        }
        $reg->save();
        return redirect()->back();
    }

    public function history(){
        $registrations = Registration::where('user_id',Auth::user()->id)->paginate(10);
        return view('registrations.history',compact('registrations'));
    }
    public function showQrCode($code){
        $qrcode = Registration::where('code',$code)->first();
        return view('registrations.showqr',compact('qrcode'));
    }
}
