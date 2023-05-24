<?php

namespace App\Http\Controllers\admin;
use App\Classes\Helper;
use App\Models\Empcategory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Session;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function __construct() {
    $this->middleware('CheckAdminLogin');
    $this->viewprefix = 'admin.employee.';
    $this->viewnamespace = 'panel/employee';
    $this->index = 'employee.index';
  }
    public function index()
    {

      $employee = Employee::all();
      $empcategory = Empcategory::all();
      return view($this->viewprefix . 'index', compact('employee','empcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $employee = Employee::all();
      $empcategory = Empcategory::all();
      return view($this->viewprefix.'create',compact('empcategory','employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data=$request->validate([
        'name' => 'required',
        'keyword' => '',
        'description' => '',
        'content' => '',
        'idcat' => 'required',
        'status'=> 'required',
      ]);

      $data['image'] = Helper::imageUpload($request);
      if(Employee::create( $data))
        Session::flash('message', 'successfully!');
      else
        Session::flash('message', 'Failure!');
      return redirect()->route($this->index);
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
    public function edit(Employee $employee)
    {
//      $employee = Employee::all();
      $empcategory = Empcategory::all();
      return view($this->viewprefix.'edit',compact('employee', 'empcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
      $data=$request->validate([
        'name' => 'required',
        'keyword' => '',
        'description' => '',
        'content' => '',
        'idcat' => 'required',
        'status'=> 'required',
      ]);
      $data['image'] = Helper::imageUpload($request);
      if($employee->update($data))
        Session::flash('message', 'successfully!');
      else
        Session::flash('message', 'Failure!');
      return redirect()->route($this->index);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
      if($employee->delete())
        Session::flash('message', 'successfully!');
      else
        Session::flash('message', 'Failure!');
      return redirect()->route('employee.index');
    }
  public function changestatusemployee($id) {
    $employee = Employee::find($id);
    $employee->status = !$employee->status;
    if ($employee->save()) {
      return redirect()->back();
    }
    else {
      return redirect(route('changestatusemployee'));
    }
  }

}
