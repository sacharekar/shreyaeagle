<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MutualFund;
use App\Customer;

class MutualFundsController extends Controller
{
    public function index()
    {
        //
        $mutualfunds=MutualFund::all();
        return view('mutualfunds.index',compact('mutualfunds'));
    }

    public function show($id)
    {

        $mutualfund = MutualFund::findOrFail($id);

        return view('mutualfunds.show',compact('mutualfund'));
    }


    public function create()
    {

        $customers = Customer::lists('name','id');
        return view('mutualfunds.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $mutualfund= new MutualFund($request->all());
        $mutualfund->save();

        return redirect('mutualfunds');
    }

    public function edit($id)
    {
        $mutualfund=MutualFund::find($id);
        return view('mutualfunds.edit',compact('mutualfund'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        //
        $mutualfund= new MutualFund($request->all());
        $mutualfund=MutualFund::find($id);
        $mutualfund->update($request->all());
        return redirect('mutualfunds');
    }

    public function destroy($id)
    {
        MutualFund::find($id)->delete();
        return redirect('mutualfunds');
    }
}
