<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\CustomerMeterSet;
use App\Meter;



class ReadingController extends Controller
{
    
    public function create()
    {
        return view('customercare.readings.create');
    }

    public function search(Request $request)
    {
        if($request->get('customer_id')){
            $customer_id = $request->get('customer_id');
            $customer = CustomerMeterSet::where('customer_id', $customer_id)->first();
        }
        
        if(!$customer){
            if($request->get('meter_no')){
                $meter_no = $request->get('meter_no');
                $meter = Meter::where('meter_no', $meter_no)->first();
                if($meter){
                    $meter_id = $meter->meter_id;
                    $customer = CustomerMeterSet::where('bulk_meter_id', $meter_id)->first();
                    if(!$customer){
                        $customer = CustomerMeterSet::where('dom_meter_id', $meter_id)->first();
                    }
                }
                //$customer = CustomerMeterSet::where('customer_id', $customer_id)->first();
            }
        }
        
        if(!$customer){
            //return redirect('/customer')->with('errors', [''=>'Customer not found']);
            return redirect()->back()->withInput()->withErrors("Customer not found or customer has no meters");
        }

        $previousReadings =  DB::select('select cb.meter_set_id, cb.customer_id, 
                                                cb.dom_meter_id, md.meter_no as dom_meter,
                                                cb.bulk_meter_id, mb.meter_no as bulk_meter,
                                                reading_date, reading_id, period, dom_meter_reading,
                                                bulk_meter_reading, consumption, remaining_units,
                                                previous_reading_id, bulk_consumption
                                        from meter_readings mr, customer_meter_sets cb, meters mb, meters md
                                        where mb.meter_id = cb.bulk_meter_id
                                            and md.meter_id = cb.dom_meter_id
                                            and cb.meter_set_id = mr.meter_set_id
                                            and reading_id = (select max(reading_id) from meter_readings
                                                            where customer_id = :customerId)', ['customerId' => $customer->customer_id]);


        return view(customercare.readings.create)->with('previousReadings', $previousReadings);

    }
}