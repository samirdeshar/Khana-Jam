<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Mail\CustomerForgetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CustomerSignupRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\CustomerprofileRequest;
use App\Http\Requests\CustomerUpdatePasswordRequest;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $customer = null;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    public function signUpForm(Request $request)
    {
        if ($request->has('redirect')) {
            Session::put('redirect_to', $request->input('redirect'));
        }
        return view('frontend.login');
    }

    public function signup(CustomerSignupRequest $request)
    {
        // dd($request->all());

        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);
            if ($request->image) {
                $data['image'] = uploadImage($request->image, 'customer', '300x300');
            } else {
                $data['image'] = null;
            }
            $this->customer->fill($data);
            $this->customer->save();
            DB::commit();
            Toastr::success('Registration Success !!', 'Success !!!');
            return redirect()->back()->with('success', 'Registration Success !!', 'Success !!!');
        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->with('error', 'Email Or Password Doesnot Match !!', 'Error !!!');
        }
    }

    public function login(Request $request)
    {
        if ($request->has('redirect')) {
            Session::put('redirect_to', $request->input('redirect'));
        }
        return view('frontend.login');
    }

    public function loginData(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            if (Session::has('redirect_to')) {
                $redirectUrl = Session::get('redirect_to');
                Session::forget('redirect_to');
                return redirect()->to($redirectUrl)->with('success', 'Successfully logged in');
            } else {
                return redirect()->route('fronthome')->with('success', 'Successfully logged in');
            }
        } else {
            Toastr::warning('Email or Password does not match!', 'Error');
            return redirect()->back()->with('error', 'Email or Password does not match!');
        }
    }
    public function forgetPasswordForm()
    {
        
        return view('frontend.forgetpasswordCustomer');
    }



    public function forgetPasswordSend(ForgetPasswordRequest $request)
    {
        $customer = Customer::whereEmail($request->email)->first();
       
        if (!$customer) {
            Toastr::warning('Invalid Email.', 'Error !!!');
            return redirect()->back();
        }
        Mail::to($request->email)->send(new CustomerForgetPassword($request->email));
        Toastr::success('Reset Link Has Been Sent To Your Mail.', 'Success !!!');
        return redirect()->back();
    }

    public function resetLinkPassword(Request $request, $email)
    {
        $customer = Customer::whereEmail($email)->first();
        if (!$customer) {
            Toastr::warning('Something Went Wrong.', 'Error !!!');
        }
        return view('frontend.forgetpasswordCustomerlink')->with('email', $email);
    }

    public function updatePassword(CustomerUpdatePasswordRequest $request)
    {
        $customer = Customer::whereEmail($request->email)->first();
        if (!$customer) {
            Toastr::warning('Something Went Wrong.', 'Error !!!');
        }

        DB::beginTransaction();
        try {
            $customer->password = bcrypt($request->password);
            $status = $customer->save();
            if ($status) {
                DB::commit();
                if (auth()->guard('customer')->user()) {
                    Auth::guard('customer')->logout();
                }
                Toastr::success('password Updated Successfully !!.', 'Success !!!');
                return redirect()->route('customer.login')->with('success', 'Password Updated Successfully');
            } else {
                Toastr::warning('Something Went Wrong.', 'Error !!!');
                return redirect()->route('customer.forgetPassword');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Toastr::warning('Something Went Wrong.', 'Error !!!');
            return redirect()->route('customer.forgetPassword');
        }
    }

    public function customerDashboard()
    {
        $customer = auth()->guard('customer')->user();
        $customerTrip = $customer->getTrip;
        return view('frontend.dashboardcus', compact('customerTrip'));
    }

    public function customerProfile()
    {
        $customer = auth()->guard('customer')->user();
        if (!$customer) {
            Toastr::warning('Something Went Wrong.', 'Error !!!');
        }

        return view('frontend.customerprofile', compact('customer'));
    }

    public function customerProfileUpdate(CustomerprofileRequest $request)
    {

        $customer = auth()->guard('customer')->user();
        if (!$customer) {
            Toastr::warning('Something Went Wrong.', 'Error !!!');
        }
        $data = $request->all();
        DB::beginTransaction();
        try {
            if ($request->image) {
                $data['image'] = uploadImage($request->image, 'customer', '300x300');
            }

            $customer->fill($data);
            $customer->save();
            DB::commit();
            Toastr::success('Upadetd Success !!', 'Success !!!');
            return redirect()->route('customer.dashboard');
        } catch (\Throwable $th) {
            DB::rollback();
            Toastr::warning('Something Went Wrong !!', 'Error !!!');
            return redirect()->back();
        }
    }
}
