<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Code;
use App\Meter;

class MeteringController extends Controller
{
    //Create meter form
    public function createMeter()
    {
        $meter_types = Code::where('mcode', 'MT')->orderBy('code_desc')->pluck('code_desc', 'code');
        return view('customercare.meter.create')->with('meter_types', $meter_types);
    }

    public function storeMeter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'meter_no' => 'required|string|max:20|unique:meters',
            'meter_type' => 'required'
        ]);
         
        if ($validator->fails()) {
             //Session::flash('error', $validator->messages()->first());
             return redirect()->back()->withInput()->withErrors($validator);
        }

        $meter = new Meter([
            'meter_no' => $request->get('meter_no'),
            'meter_type'=> $request->get('meter_type'),
          ]);

          $meter->save();
          return redirect('/meter')->with('success', 'Meter has been added');
    }
}