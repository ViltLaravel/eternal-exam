<?php

namespace App\Http\Controllers\LifePlan;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    function __construct()
    {
        $this->staff = new Staff();
    }

    public function edit($id) {
        $edit = $this->staff->editCustomerStaff($id);

        return view('staff.update', compact('edit'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'product'       => ['required', 'string', Rule::in('Life Plan', 'Education Plan', 'Pension Plan')],
            'price'         => 'required|string|max:191',
            'payment'         => 'required|string|max:191',
        ]);

        $data = [
            'product'       =>$request->input('product'),
            'price'         =>$request->input('price'),
            'payment'         =>$request->input('payment'),
        ];

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else {
            $update = $this->staff->updateCustomerStaff($request->id, $data);
            return redirect()->back()->with([
                'create' => $update,
                'status' => 200,
                'message' => 'Credentials successfully updated'
            ], 200);
        }
    }

    public function print($id) {
        $printCustomerStaff = $this->staff->printCustomerStaff($id);

        return view('staff.print', compact('printCustomerStaff'));
    }
}
