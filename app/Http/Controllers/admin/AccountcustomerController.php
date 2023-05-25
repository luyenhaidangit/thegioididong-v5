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
   
    // Account index
    public function index()
    {
        //
        $customers = AccountCustomer::where('status','<>',0)->get();
        return view($this->viewprefix.'index', compact('customers'));
    }

    // Update
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

    // Change status
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

    // Unlock Account
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
