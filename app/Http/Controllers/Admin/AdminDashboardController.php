<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegisterVaccine;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $register1 = RegisterVaccine::where('number', 1)->where('status', 1)->get();
        $count1 = count($register1);
        $register2 = RegisterVaccine::where('number', 2)->where('status', 1)->get();
        $count2 = count($register2);
        $register3 = RegisterVaccine::where('number', 3)->where('status', 1)->get();
        $count3 = count($register3);
        $register4 = RegisterVaccine::where('number', 4)->where('status', 1)->get();
        $count4 = count($register4);
        $register5 = RegisterVaccine::where('vaccine_name', 'AstraZeneca')->where('status', 1)->get();
        $count5 = count($register5);
        $register6 = RegisterVaccine::where('vaccine_name', 'Pfizer')->where('status', 1)->get();
        $count6 = count($register6);
        $register7 = RegisterVaccine::where('vaccine_name', 'Sinopharm')->where('status', 1)->get();
        $count7 = count($register7);
        $register8 = RegisterVaccine::where('vaccine_name', 'Moderna')->where('status', 1)->get();
        $count8 = count($register8);
        return view('admin.dashboard')
            ->with(compact('count1', 'count2', 'count3', 'count4', 'count5', 'count6', 'count7', 'count8'));
    }
}
