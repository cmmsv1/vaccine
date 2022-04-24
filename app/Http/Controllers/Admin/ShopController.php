<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Oxy;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $oxies = Oxy::paginate(8);
        return view('shop.index')
            ->with(compact('oxies'));
    }
}
