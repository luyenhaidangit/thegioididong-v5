<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AccountCustomer;
use Illuminate\Http\Request;
use Session;

class AccountcustomerController extends Controller
{
    public function __construct()
    {

        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.customer.';
        $this->index='customer.index';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = AccountCustomer::where('status','<>',0)->get();
        return view($this->viewprefix.'index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, AccountCustomer $accountCustomer)
    {
        //
        if ($accountCustomer->update(['status'=>2])) {
            Session::flash('message', 'Khóa thành công!');
        }
        else {
            Session::flash('message', 'Khóa thất bại!');
        }
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountCustomer $accountCustomer)
    {
        //

    }
    public function changestatuscustomerlock($id) {
        $customer = AccountCustomer::find($id);
        $customer->status = 2;
        if ($customer->save()) {
            Session::flash('message', 'Khóa thành công!');
            return redirect()->back();
        }
        else {
            return redirect(route('changestatuscustomer'));
        }
    }
    public function changestatuscustomerunlock($id) {
        $customer = AccountCustomer::find($id);
        $customer->status = 1;
        if ($customer->save()) {
            Session::flash('message', 'Mở Khóa thành công!');
            return redirect()->back();
        }
        else {
            return redirect(route('changestatuscustomer'));
        }
    }

}
