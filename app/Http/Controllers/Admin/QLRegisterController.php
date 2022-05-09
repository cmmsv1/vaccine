<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RegisterVaccine;
use Illuminate\Http\Request;

class QLRegisterController extends Controller
{
    public function index()
    {
        $dates = RegisterVaccine::paginate(8);
        return view('admin.register.index')
            ->with('dates', $dates);
    }
    public function read(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->search;
            $search = str_replace(" ", "%", $search);
            $dates = RegisterVaccine::where('name', 'like', '%' . $search . '%')->paginate(8);
            return view('admin.register.read')
                ->with('dates', $dates)->render();
        }
    }
    public function create()
    {
        return view('admin.register.create');
    }
    public function store(Request $request)
    {
        $register_id = $request->id;
        if ($register_id) {
            $register = RegisterVaccine::find($register_id);
            $register->status = $request->status;
            $register->update();
            return response()->json(['message' => 'Cập nhật trạng thái tiêm thành công']);
        }
    }
    public function edit($id)
    {
        $register = RegisterVaccine::find($id);
        return view('admin.register.edit')
            ->with(compact('register'));
    }
    public function remove($id)
    {
        $date = RegisterVaccine::find($id);
        $date->delete();
        return response()->json([
            'message' => 'Xoá ngày tiêm thành công'
        ]);
    }
}
