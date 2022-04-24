<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FormInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormInfoController extends Controller
{
    public function index()
    {
        return view('user.info.index')
            ->with('', '');
    }
    public function update(Request $request)
    {
        if ($request->id) {
            dd('ad');
            $form = FormInfo::find($request->id);
            $user_info = [
                'name' => $request->name,
                'birthday' => $request->birthday,
                'cmnd' => $request->cmnd,
                'bhyt' => $request->bhyt,
                'gender' => $request->gender,
                'doituong' => $request->doituong,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
                'house' => $request->house,
            ];
            $prehistoric = [
                'info1' => $request->info1,
                'info2' => $request->info2,
                'info3' => $request->info3,
                'info4' => $request->info4,
                'info5' => $request->info5,
                'info6' => $request->info6,
                'info7' => $request->info7,
                'info8' => $request->info8,
                'info9' => $request->info9,
            ];
            $form->user_id = Auth::id();
            $form->user_info = json_encode($user_info);
            $form->prehistoric = json_encode($prehistoric);
            $form->update();
            return response()->json(['message' => 'Cập nhật thông tin thành công']);
        } else {
            $form = new FormInfo();
            $user_info = [
                'name' => $request->name,
                'birthday' => $request->birthday,
                'cmnd' => $request->cmnd,
                'bhyt' => $request->bhyt,
                'gender' => $request->gender,
                'doituong' => $request->doituong,
                'province' => $request->province,
                'district' => $request->district,
                'ward' => $request->ward,
                'house' => $request->house,
            ];
            $prehistoric = [
                'info1' => $request->info1,
                'info2' => $request->info2,
                'info3' => $request->info3,
                'info4' => $request->info4,
                'info5' => $request->info5,
                'info6' => $request->info6,
                'info7' => $request->info7,
                'info8' => $request->info8,
                'info9' => $request->info9,
            ];
            $form->user_id = Auth::id();
            $form->user_info = json_encode($user_info);
            $form->prehistoric = json_encode($prehistoric);
            $user = User::find(Auth::id());
            $user->confirm_register = '1';
            $user->update();
            $form->save();
            return response()->json(['message' => 'Cập nhật thông tin thành công']);
        }
    }
}
