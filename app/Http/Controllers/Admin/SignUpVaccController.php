<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DateOfInjection;
use App\Models\RegisterVaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpVaccController extends Controller
{
    public function index()
    {
        $vaccines = DateOfInjection::all();
        return view('signupvacc.index')
            ->with(compact('vaccines'));
    }
    public function register(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $register = RegisterVaccine::where('date_of_injection_id', $id)->where('user_id', Auth::id())->first();
            if ($register) {
                return response()->json(['error' => 'Bạn đã đăng ký ngày này rồi !']);
            } else {
                $register = new RegisterVaccine();
                $register->user_id = Auth::id();
                $register->name = Auth::user()->name;
                $register->number = $request->number;
                $register->vaccine_name = $request->vaccine_name;
                $register->date_of_injection_id = $id;
                $register->save();
                return response()->json(['success' => 'Đăng ký thành công']);
            }
        }
    }
}
