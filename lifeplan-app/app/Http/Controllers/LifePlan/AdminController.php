<?php

namespace App\Http\Controllers\LifePlan;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function __construct() 
    {
        $this->admin = new User();
        $this->admin_create = new Admin();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'last_name'     => 'required|string|max:191',
            'email'         => 'required|email|max:191|unique:users',
            'first_name'    => 'required|string|max:191',
            'middle_name'   => 'required|string|max:191',
            'sex'           => ['required', 'string', Rule::in(['Male', 'Female'])],
            'birthday'      => 'required|date',
            'address'       => 'required|string|max:191',
            'civil_status'  => ['required', 'string', Rule::in('Single', 'Married', 'Widowed', 'Divorce')],
            'contact_number'=> 'required|string|min:7|max:20',
            'product'       => ['required', 'string', Rule::in('Life Plan', 'Education Plan', 'Pension Plan')],
            'price'         => 'required|string|max:191',
            'payment'         => 'required|string|max:191',
            'role'          => ['required', 'string', Rule::in(['admin', 'customer', 'staff'])],
        ]);

        $data = [
            'last_name'     => $request->last_name,
            'first_name'    =>$request->first_name,
            'middle_name'   =>$request->middle_name,
            'sex'           =>$request->sex,
            'birthday'      =>$request->birthday,
            'address'       =>$request->address,
            'civil_status'  =>$request->civil_status,
            'contact_number'=>$request->contact_number,
            'email'         =>$request->email,
            'product'       =>$request->product,
            'price'         =>$request->price,
            'payment'         =>$request->payment,
            'role'          =>$request->role,
        ];

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else {
            $create = $this->admin_create->createCustomerAdmin($data);
            return redirect()->back()->with([
                'create' => $create,
                'status' => 200,
                'message' => 'Credentials successfully added'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editCustomerAdmin = $this->admin_create->editCustomeradmin($id);
        return view('admin.edit', compact('editCustomerAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'last_name'     => 'required|string|max:191',
            'first_name'    => 'required|string|max:191',
            'middle_name'    => 'required|string|max:191',
            'sex'           => ['required', 'string', Rule::in(['Male', 'Female'])],
            'birthday'      => 'required|date',
            'address'       => 'required|string|max:191',
            'civil_status'  => ['required', 'string', Rule::in('Single', 'Married', 'Widowed', 'Divorce')],
            'contact_number' => 'required|string|min:7|max:20',
            'product'       => ['required', 'string', Rule::in('Life Plan', 'Education Plan', 'Pension Plan')],
            'price'         => 'required|string|max:191',
            'payment'         => 'required|string|max:191',
        ]);

        $data = [
            'last_name'     => $request->input('last_name'),
            'first_name'    =>$request->input('first_name'),
            'middle_name'    =>$request->input('middle_name'),
            'sex'           =>$request->input('sex'),
            'birthday'      =>$request->input('birthday'),
            'address'       =>$request->input('address'),
            'civil_status'  =>$request->input('civil_status'),
            'contact_number'=>$request->input('contact_number'),
            'product'       =>$request->input('product'),
            'price'         =>$request->input('price'),
            'payment'         =>$request->input('payment'),
        ];

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else {
            $update = $this->admin_create->updateCustomerAdmin($request->id, $data);
            return redirect()->back()->with([
                'create' => $update,
                'status' => 200,
                'message' => 'Credentials successfully updated'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->admin->deleteCustomerAdmin($id);
    
        return redirect()->back()->with([
            'delete' => $delete,
            'message' => 'Customer Successfully Deleted!'
        ]);
    }

    public function print($id) {
        $printCustomerAdmin = $this->admin_create->printCustomerAdmin($id);

        return view('admin.print', compact('printCustomerAdmin'));
    }
    
}
