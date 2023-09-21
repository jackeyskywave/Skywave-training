<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Customer;

use function PHPUnit\Framework\isNull;

class customerController extends Controller
{
    public function create()
    {
        $url = url('/customer');
        $customer = new Customer();
        $title = "Customer Registration Form";
        $data = compact('url', 'title', 'customer');
        return view('customer_form')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        ]);

        //Insert Query
        $customer = new Customer;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . "." . $ext;
            $image->move('storage/images', $image_name);
            $customer->image = $image_name;
        }
        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->country = implode(',', $request['country']);
        $customer->dob = $request['dob'];
        $customer->hobby = implode(',', $request['hobby']);
        $customer->password = $request['password'];
        $customer->password_confirmation = $request['password_confirmation'];
        $customer->save();

        return redirect('/customer/view');
    }

    public function view()
    {
        $customers = Customer::all();
        $data = compact('customers');
        return view('customer_view')->with($data);
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }

        return redirect('/customer/view');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            return redirect('/customer/view');
        } else {
            $url = url('/customer/update') . "/" . $id;
            $title = "Customer Update Form";
            $data = compact('customer', 'url', 'title');
            return view('customer_form')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email'];

        
        if ($request->hasFile('image') ) {
            $image_path = public_path('storage/images/'.$customer->image);
            if(file_exists($image_path)){
                unlink($image_path);
            }

            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . "." . $ext;
            $image_path = public_path('storage/images',$image_name);
            $image->move($image_path, $image_name);
            $customer->image = $image_name;
        }

        $customer->gender = $request['gender'];
        $customer->address = $request['address'];
        $customer->country = implode(',', $request['country']);
        $customer->dob = $request['dob'];
        $customer->hobby = implode(',', $request['hobby']);
        $customer->password = $request['password'];
        $customer->password_confirmation = $request['password_confirmation'];
        $customer->update();

        return redirect('/customer/view');
    }
}
