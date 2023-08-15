<?php

namespace App\Http\Controllers\LifePlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LifePlanController extends Controller
{
    function __construct() {
        $this->customer = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $all = $this->customer->allCustomer();
        $allCustomerAdmin = $this->customer->allCustomerAdmin();
        $allCustomerStaff = $this->customer->allCustomerStaff();
        
        if ($user->role === 'admin') {
            return view('admin.index', compact('allCustomerAdmin'));
        } elseif ($user->role === 'staff') {
            return view('staff.index',compact('allCustomerStaff'));
        } else {
            return view('customer.index', compact('all'));
        }
    }

    public function printCustomer($id) {
        $print = $this->customer->printCredentials($id);
        return view('customer.print', compact('print'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'first_name'    => 'required|string|max:191',
            'middle_name'    => 'required|string|max:191',
            'sex'           => ['required', 'string', Rule::in(['Male', 'Female'])],
            'birthday'      => 'required|date',
            'address'       => 'required|string|max:191',
            'civil_status'  => ['required', 'string', Rule::in('Single', 'Married', 'Widowed', 'Divorce')],
            'contact_number' => 'required|string|min:7|max:20',
            'product'       => ['required', 'string', Rule::in('Life Plan', 'Education Plan', 'Pension Plan')],
            'price'         => 'required|string|max:191',
        ]);

        $data = [
            'last_name'     => $request->last_name,
            'first_name'    =>$request->first_name,
            'middle_name'    =>$request->middle_name,
            'sex'           =>$request->sex,
            'birthday'      =>$request->birthday,
            'address'       =>$request->address,
            'civil_status'  =>$request->civil_status,
            'contact_number'=>$request->contact_number,
            'product'       =>$request->product,
            'price'         =>$request->price,
        ];

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else {
            $create = $this->customer->createCustomer(Auth::user()->id, $data);
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
}
