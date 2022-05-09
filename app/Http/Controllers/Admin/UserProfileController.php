<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormInfo;
use App\Models\Oxy;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        $forms = FormInfo::orderBy('id', 'asc')->paginate(8);
        return view('admin.user_profile.index')
            ->with(compact('forms'));
    }
    public function getItem(Request $request)
    {
        if ($request->ajax()) {
            $forms = FormInfo::orderBy('id', 'asc')->paginate(8);
            return view('admin.user_profile.item')
                ->with(compact('forms'))->render();
        }
    }
    public function detail($id)
    {
        $info = FormInfo::find($id);
        $user_info = json_decode($info->user_info);
        $prehistoric = json_decode($info->prehistoric);
        if (!empty($info)) {
            return view('admin.user_profile.detail')
                ->with(compact('user_info', 'prehistoric', 'info'));
        } else {
            abort(404);
        }
    }
    public function update(Request $request, $id)
    {
        $info = FormInfo::find($id);
        if (!empty($info)) {
            $user = User::find($info->user_id);
            $user->confirm_register = '2';
            $user->update();
            return response()->json(['message' => 'Cập nhật thành công']);
        } else {
            abort(404);
        }
    }
}
