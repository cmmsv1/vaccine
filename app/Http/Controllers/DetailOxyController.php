<?php

namespace App\Http\Controllers;

use App\Models\Oxy;
use Illuminate\Http\Request;

class DetailOxyController extends Controller
{
    public function index($slug)
    {
        $oxy = Oxy::where('slug', $slug)->first();
        return view('oxydetail.index')
            ->with(compact('oxy'));
    }

    public function payment()
    {
        return view('oxydetail.payment');
    }
}
