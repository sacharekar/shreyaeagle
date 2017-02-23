<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;

class StringController extends Controller
{
    public function stringify($id)
    {
        /*// $customer=Customer::where('id', $id)->select('customer_id','name','address','city','state','zip','home_phone','cell_phone')->first();
        $customer = Customer::where('cust_number', $id)->select('cust_number','name','address','city','state','zip','home_phone','cell_phone')->first();

        $customer = $customer->toArray();
        return response()->json($customer);*/
        $customer = Customer::where('cust_number', $id)->select('cust_number', 'name', 'address', 'city', 'state', 'zip', 'home_phone', 'cell_phone')->first();

        $customer = $customer->toArray();
        return response()->json($customer);

    }
}
