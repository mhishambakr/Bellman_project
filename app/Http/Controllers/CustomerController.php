<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view('customers/customers', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::get();
        return view('customers/create', compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $customer=new Customer();
        $customer->firstName=$request->first_name;
        $customer->lastName=$request->last_name;
        $customer->email=$request->email;
        $customer->phone=$request->phone_number;
        $customer->shopId=$request->shopId;
        $customer->save();
        return redirect('customers/show/'.$customer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::where('id','=', $id)->first();
        return view('customers/show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::where('id', $id)->first();
        return view('customers/edit',compact('customer'));
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
        $customer=Customer::where('id', $id)->first();
        $customer->firstName=$request->first_name;
        $customer->lastName=$request->last_name;
        $customer->email=$request->email;
        $customer->phone=$request->phone_number;
        $customer->shopId=1;
        $customer->save();
        return view('customers/show', compact('customer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::find($id);
        $customer->delete();
        return redirect('customers');
    }
}
