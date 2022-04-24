<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DateOfInjection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DateOfInjectionController extends Controller
{
    public function index()
    {
        $dates = DateOfInjection::paginate(4);
        return view('admin.date.index')
            ->with('dates', $dates);
    }
    public function read(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->search;
            $search = str_replace(" ", "%", $search);
            $dates = DateOfInjection::where('name', 'like', '%' . $search . '%')->paginate(4);
            return view('admin.date.read')
                ->with('dates', $dates)->render();
        }
    }
    public function create()
    {
        return view('admin.date.create');
    }
    public function store(Request $request)
    {
        $date_id = $request->id;
        if ($date_id) {
            $date = DateOfInjection::find($date_id);
            $date->name = $request->name;
            $date->address = $request->address;
            $date->number = $request->number;
            $date->time = $request->time;
            $date->date = $request->date;
            $date->update();
            return response()->json(['message' => 'Cập nhật ngày tiêm thành công']);
        } else {
            $date = new DateOfInjection();
            $date->name = $request->name;
            $date->address = $request->address;
            $date->number = $request->number;
            $date->time = $request->time;
            $date->date = $request->date;
            $date->save();
            return response()->json(['message' => 'Thêm ngày tiêm thành công']);
        }
    }
    public function edit($id)
    {
        $date = DateOfInjection::find($id);
        return view('admin.date.edit')
            ->with(compact('date'));
    }
    public function remove($id)
    {
        $date = DateOfInjection::find($id);
        $date->delete();
        return response()->json([
            'message' => 'Xoá ngày tiêm thành công'
        ]);
    }
}
