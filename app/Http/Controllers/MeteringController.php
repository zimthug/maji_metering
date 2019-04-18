<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Code;
use App\Meter;
use App\CustomerMeterSet;
use App\CurrentMeterData;

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

    public function createMeterAssignment()
    {
        $meter_status = Code::where('mcode', 'AS')->orderBy('code_desc')->pluck('code_desc', 'code');
        return view('customercare.meter.assign')->with('meter_status', $meter_status);
    }


    public function assignMeter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'outlet_meter_no' => 'required|string|max:20|exists:meters,meter_no',
            'inlet_meter_no' => 'required|string|max:20|exists:meters,meter_no',
            'customer_id' => 'required|numeric|exists:customers,customer_id',           
        ]);
         
        if ($validator->fails()) {
             //Session::flash('error', $validator->messages()->first());
             return redirect()->back()->withInput()->withErrors($validator);
        }

        //$meter_id = $request->get('meter_no')
        $dom_meter = Meter::where('meter_no', $request->get('outlet_meter_no'))->first();
        $bulk_meter = Meter::where('meter_no', $request->get('inlet_meter_no'))->first();
               
        $meter_set = new CustomerMeterSet([
            'dom_meter_id' => $dom_meter->meter_id,
            'bulk_meter_id' => $bulk_meter->meter_id,
            'dom_meter_status'=> $request->get('outlet_meter_status'),
            'bulk_meter_status'=> $request->get('inlet_meter_status'),
            'customer_id'=> $request->get('customer_id'),
            'date_installed'=> $request->get('date_installed'),
            'date_removed' => $request->get('date_removed')
          ]);


          $meter_set->save();
          return redirect('/assign_meters')->with('success', 'Meter has been assigned to the customer');
          
    }
}