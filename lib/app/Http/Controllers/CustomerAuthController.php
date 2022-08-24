<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerAuthController extends Controller
{
    //
    public function customerlogin(){
        return view("auth.customerlogin");
    }

    public function registration(){
        return view("auth.registration");
    }

    public function registerUser(Request $request){
        $request->validate([
            'email'=>'required|email|unique:customers',
            'password'=>'required|min:5|max:12|'
        ]);
        $customer = new Customers();
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $res = $customer->save();
        if($res){
            return back()->with('success','You have register successfully');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email|',
            'password'=>'required|min:5|max:12'
        ]);
        $customer = Customers::where('email','=',$request->email)->first();
        if($customer){
            if(Hash::check($request->password,$customer->password)){
                $request->session()->put('loginId',$customer->id);
                return redirect('/');
            }else {
            return back()->with('fail','Incorrect Password.');
        }
        }else {
            return back()->with('fail','This email is not registered.');
        }
    }

    public function dashboard(){
        $data = Customers::get();
        // if (Session::has('loginId')){
        //     $data = Customers::where('id','=', Session::get('loginId'))->first();   
        // }
        return view('dashboard', compact('data'));
    }

    public function edit($id){
        $data = Customers::where('id','=',$id)->first();
        return view('EditCustomer', compact('data'));
    }

    public function update(Request $request){
        $id = $request->id;
        Customers::where('id','=',$id)->update([
            'email'=> $request->email
        ]);
    }

    public function logout(){
        if(Session::has('loginId')){
           Session::pull('loginId');
           return redirect('customerlogin');
        }
    }
}
