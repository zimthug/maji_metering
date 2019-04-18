<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Code;
use App\Town;
use App\Customer;
use App\Http\Requests\StoreCustomerPost;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customercare.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $towns = Town::orderBy('town')->pluck('town', 'town_id');
        return view('customercare.customer.create')->with('towns', $towns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerPost $request)
    {
        $validated = $request->validated();

        /*
        if($validated->fails()){
            return redirect()->back()->withInput();
        }*/

        $customer = new Customer([
            'surname' => $request->get('surname'),
            'first_name'=> $request->get('firstname'),
            'other_names'=> $request->get('other_name'),
            'email'=> $request->get('email'),
            'address'=> $request->get('address'),
            'street'=> $request->get('street'),
            'town'=> $request->get('town'),
            'customer_status'=> $request->get('customer_status'),
            'connection_date'=> $request->get('connection_date'),
            'disconnection_date'=> $request->get('disconnection_date'),
            'last_updated_by'=> 'XXXX' //To change this
          ]);

          $customer->save();
          return redirect('/customer')->with('success', 'Customer has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $towns = Town::orderBy('town')->pluck('town', 'town_id');
        return view('customercare.customer.create')->with('towns', $towns);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
    static function getTownName($town_id)
    {
        return Town::where('town_id', $town_id)->get('town');
    }*/

    public function searchresult(Request $request)
    {
        if($request->get('customer_id')){
            $customer_id = $request->get('customer_id');
            $customer = Customer::where('customer_id', $customer_id)->first();
        }
        
        if($request->get('meter_no')){
            $meter_no = $request->get('meter_no');
        }
        
        $town = Town::where('town_id', $customer->town)->first();

        $status = Code::where('code', $customer->customer_status)->first();

        return view('customercare.customer.searchresult')->with('customer', $customer)
        ->with('town_name', $town->town)    
        ->with('status_desc', $status->code_desc);
    }

    
}