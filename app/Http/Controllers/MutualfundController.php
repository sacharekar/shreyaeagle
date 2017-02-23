<?php

namespace App\Http\Controllers;

use App\mutualfunds;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;
class MutualfundController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
{
    //
    $mutualfunds=mutualfunds::all();
    return view('mutualfunds.index',compact('mutualfunds'));
}

    public function show($id)
    {

        $mutualfund = mutualfunds::findOrFail($id);

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

        $mutualfund= new mutualfunds($request->all());
        $mutualfund->save();

        return redirect('mutualfunds');
    }

    public function edit($id)
    {
        $mutualfund=mutualfunds::find($id);
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
        $mutualfund= new mutualfunds($request->all());
        $mutualfund=mutualfunds::find($id);
        $mutualfund->update($request->all());
        return redirect('mutualfunds');
    }

    public function destroy($id)
    {
        mutualfunds::find($id)->delete();
        return redirect('mutualfunds');
    }

    public function delete($id)
    {
        mutualfunds::destroy($id);
    }
}
